<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Post;
use App\Models\PostTranslation; // Importamos el nuevo modelo

class Blog extends BaseController
{
    // ========================================================================
    // VISTAS PÚBLICAS (Lector)
    // ========================================================================

    public function index()
    {
        $model = new Post();
        $locale = $this->request->getLocale(); // Detectamos el idioma actual

        $data = [
            'posts' => $model->getPostsByLanguage($locale), // Función del PostModel
            'title' => 'Blog de Raven'
        ];

        return view('blog_index', $data);
    }

    public function show($slug)
    {
        $model = new Post();
        $locale = $this->request->getLocale();
        
        $post = $model->getPostBySlug($slug, $locale); 

        if (!$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('blog_show', [
            'post'             => $post,
            'meta_title'       => $post['meta_title'],
            'meta_description' => $post['meta_description'],
            'keywords'         => $post['keywords']
        ]);
    }

    // ========================================================================
    // PANEL DE ADMINISTRACIÓN (Escritor)
    // ========================================================================

    public function create()
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/' . $this->request->getLocale() . '/login');
        }
        
        helper('form');
        return view('blog_create', ['title' => 'Crear Nuevo Artículo']);
    }

    public function store()
    {
        $locale = $this->request->getLocale();
        
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/' . $locale . '/login');
        }

        $postModel = new Post();
        $transModel = new PostTranslation();

        // 1. PREPARAMOS Y GUARDAMOS LA PARTE GENERAL (La Imagen)
        $postData = ['is_active' => 1];

        $img = $this->request->getFile('image');
        if ($img && $img->isValid() && ! $img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(ROOTPATH . 'public/uploads/blog', $newName);
            $postData['image'] = $newName; 
        }

        // Insertamos en tabla 'posts' y capturamos el ID generado
        $postModel->insert($postData);
        $postId = $postModel->getInsertID();

        // 2. GUARDAMOS LA TRADUCCIÓN (Los Textos)
        $slug = url_title($this->request->getPost('title'), '-', true);
        
        $transData = [
            'post_id'          => $postId,
            'language_code'    => $locale, // Se guarda en el idioma actual del panel
            'title'            => $this->request->getPost('title'),
            'slug'             => $slug,
            'content'          => $this->request->getPost('content'),
            'meta_title'       => $this->request->getPost('meta_title') ?: $this->request->getPost('title'),
            'meta_description' => $this->request->getPost('meta_description'),
            'keywords'         => $this->request->getPost('keywords'),
        ];

        $transModel->insert($transData);

        return redirect()->to('/' . $locale . '/blog');
    }

    public function edit($id)
    {
        $locale = $this->request->getLocale();
        
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/' . $locale . '/login');
        }

        $model = new Post();
        
        // Traer el post + su texto en el idioma actual
        $post = $model->select('posts.*, t.id as translation_id, t.title, t.content, t.meta_title, t.meta_description, t.keywords')
                      ->join('post_translations t', 't.post_id = posts.id', 'left')
                      ->where('posts.id', $id)
                      ->where('t.language_code', $locale)
                      ->first();

        // Si no existe la traducción aún para este idioma, enviamos la data base vacía
        if (!$post) {
            $post = $model->find($id);
            if (!$post) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
            $post['title'] = ''; $post['content'] = ''; $post['meta_title'] = ''; $post['meta_description'] = ''; $post['keywords'] = '';
        }

        helper('form');
        return view('blog_edit', [
            'post'  => $post,
            'title' => 'Editar Artículo'
        ]);
    }

    public function update($id)
    {
        $locale = $this->request->getLocale();
        
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/' . $locale . '/login');
        }

        $postModel = new Post();
        $transModel = new PostTranslation();
        $post = $postModel->find($id);

        if (!$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // 1. ACTUALIZAR IMAGEN SI SE SUBE UNA NUEVA
        $img = $this->request->getFile('image');
        if ($img && $img->isValid() && ! $img->hasMoved()) {
            if (!empty($post['image'])) {
                $oldPath = ROOTPATH . 'public/uploads/blog/' . $post['image'];
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $newName = $img->getRandomName();
            $img->move(ROOTPATH . 'public/uploads/blog', $newName);
            
            $postModel->update($id, ['image' => $newName]);
        }

        // 2. ACTUALIZAR O INSERTAR LA TRADUCCIÓN
        $slug = url_title($this->request->getPost('title'), '-', true);
        
        $transData = [
            'post_id'          => $id,
            'language_code'    => $locale,
            'title'            => $this->request->getPost('title'),
            'slug'             => $slug,
            'content'          => $this->request->getPost('content'),
            'meta_title'       => $this->request->getPost('meta_title') ?: $this->request->getPost('title'),
            'meta_description' => $this->request->getPost('meta_description'),
            'keywords'         => $this->request->getPost('keywords'),
        ];

        // Verificamos si ya existe una traducción para este post en este idioma
        $existingTranslation = $transModel->where('post_id', $id)->where('language_code', $locale)->first();

        if ($existingTranslation) {
            $transModel->update($existingTranslation['id'], $transData);
        } else {
            $transModel->insert($transData);
        }

        return redirect()->to('/' . $locale . '/blog/' . $slug);
    }

    public function delete($id)
    {
        $locale = $this->request->getLocale();
        
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/' . $locale . '/login');
        }

        $model = new Post();
        $post = $model->find($id);

        if (!$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Eliminar la imagen del servidor si existe
        if (!empty($post['image'])) {
            $imgPath = ROOTPATH . 'public/uploads/blog/' . $post['image'];
            if (file_exists($imgPath)) {
                unlink($imgPath);
            }
        }

        // Al borrar el post base, la base de datos (por el ON DELETE CASCADE de tu SQL) borrará sus traducciones automáticamente
        $model->delete($id);
        
        return redirect()->to('/' . $locale . '/blog');
    }
}