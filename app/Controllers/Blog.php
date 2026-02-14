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

        $model->save($data);
        return redirect()->to('/blog');
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

}
