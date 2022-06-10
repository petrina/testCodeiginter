<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Auth extends BaseController
{

    function __construct() {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        if ($this->session->get('auth') === true) {
            return view('auth/logout');
        } else {
            return redirect()->to('/login');
        }
    }

    public function register() {
        if ($this->session->get('auth') !== true) {
            return view('auth/login');
        } else {
            return redirect()->to('/userpage');
        }
    }

    public function checkUser() {
        $response = false;
        $post = $this->request->getPost();
        $userMod = new User();
        $userObj = $userMod->findUser($post['login'], $post['password']);
        if ($userObj !== null) {
            $response = true;
            $this->session->set('auth', true);
        }
        return json_encode(['response' => $response]);
    }

    public function logout() {
        $this->session->remove('auth');
        return json_encode(['response' => true]);
    }
}
