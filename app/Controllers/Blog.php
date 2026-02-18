<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Post;

class Blog extends BaseController
{
    public function index()
    {
        $model = new Post(); // Instanciamos el modelo

        $data = [
            'posts' => $model->findAll(), // Traemos TODOS los posts
            'title' => 'Blog de Raven'
        ];

        return view('blog_index', $data); // Cargamos la vista (que crearemos ahora)
    }

    public function create()
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        helper('form'); // Cargamos el ayudante de formularios
        return view('blog_create', ['title' => 'Crear Nuevo Artículo']);
    }

    public function store()
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        $model = new \App\Models\Post();

        // Generamos el slug automáticamente desde el título
        $slug = url_title($this->request->getPost('title'), '-', true);

        $data = [
            'title'            => $this->request->getPost('title'),
            'slug'             => $slug,
            'content'          => $this->request->getPost('content'),
            // Si el usuario no pone meta title, usamos el título normal
            'meta_title'       => $this->request->getPost('meta_title') ?: $this->request->getPost('title'),
            'meta_description' => $this->request->getPost('meta_description'),
            'keywords'         => $this->request->getPost('keywords'),
        ];

        // Manejo de la imagen
        $img = $this->request->getFile('image');
        if ($img && $img->isValid() && ! $img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(ROOTPATH . 'public/uploads/blog', $newName);
            $data['image'] = $newName; 
        }

        $model->save($data);
        return redirect()->to($this->request->getLocale() . '/blog');
    }

    // Ver un artículo individual (Genera la página SEO)
    public function show($slug)
    {
        $model = new \App\Models\Post();
        $post = $model->where('slug', $slug)->first();

        if (!$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Pasamos los datos a la vista, incluyendo los de SEO para el Layout
        return view('blog_show', [
            'post'             => $post,
            'meta_title'       => $post['meta_title'],
            'meta_description' => $post['meta_description'],
            'keywords'         => $post['keywords']
        ]);
    }

    public function edit($id)
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to($this->request->getLocale() . '/login');
        }

        $model = new Post();
        $post = $model->find($id);

        if (!$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        helper('form');
        return view('blog_edit', [
            'post'  => $post,
            'title' => 'Editar Artículo'
        ]);
    }

    public function update($id)
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to($this->request->getLocale() . '/login');
        }

        $model = new Post();
        $post = $model->find($id);

        if (!$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Regeneramos el slug desde el nuevo título
        $slug = url_title($this->request->getPost('title'), '-', true);

        $data = [
            'id'               => $id,
            'title'            => $this->request->getPost('title'),
            'slug'             => $slug,
            'content'          => $this->request->getPost('content'),
            'meta_title'       => $this->request->getPost('meta_title') ?: $this->request->getPost('title'),
            'meta_description' => $this->request->getPost('meta_description'),
            'keywords'         => $this->request->getPost('keywords'),
        ];

        // Manejo de la imagen: solo reemplazar si se sube una nueva
        $img = $this->request->getFile('image');
        if ($img && $img->isValid() && ! $img->hasMoved()) {
            // Eliminar imagen anterior si existe
            if (!empty($post['image'])) {
                $oldPath = ROOTPATH . 'public/uploads/blog/' . $post['image'];
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $newName = $img->getRandomName();
            $img->move(ROOTPATH . 'public/uploads/blog', $newName);
            $data['image'] = $newName;
        }

        $model->save($data);
        return redirect()->to($this->request->getLocale() . '/blog/' . $slug);
    }

    public function delete($id)
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to($this->request->getLocale() . '/login');
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

        $model->delete($id);
        return redirect()->to($this->request->getLocale() . '/blog');
    }

}
