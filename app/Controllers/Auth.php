<?php namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        // Si ya está logueado, lo mandamos al dashboard/blog
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/blog');
        }
        return view('auth_login');
    }

    public function attemptLogin()
    {
        $session = session();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Conexión manual rápida a la BD para verificar
        $db = \Config\Database::connect();
        $user = $db->table('users')->where('email', $email)->get()->getRowArray();

        if ($user) {
            // Verificar el hash de la contraseña
            if (password_verify($password, $user['password'])) {
                $session->set([
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'isLoggedIn' => true
                ]);
                return redirect()->to('/blog');
            }
        }

        // Si falla
        return redirect()->back()->with('error', 'Credenciales incorrectas');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}