<?php

namespace controllers;

use libs\Authentication;
use libs\Controller;
use libs\Session;
use libs\Validation;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        $this->viewObj('login/login');
        $this->setViewData();
    }

    public function login()
    {
        $this->viewObj('login/login');
        $userModel      = $this->modelObj('\models\User');
        $authentication = new Authentication($userModel);
        $validation     = new Validation;

        $input = $validation->escapeInput($_POST);

        $username = $input['username'];
        $password = $input['password'];

        $validation->checkInput();

        if ( ! $validation->isInputValid()) {
            $this->view->data['errors'] = $validation->getErrors();
        } elseif ( ! $validation->isTokenValid()) {
            die('No access!');
        } elseif ( ! $authentication->verifyLogin($username, $password)) {
            $this->view->data['errors'] = $authentication->getErrors();
        } else {
            if ($authentication->isAdmin($username)) {
                Session::setSession('admin', 'admin');
                header('location: ' . BASE_URL);
            }
            Session::setSession('username', $username);
            Session::setSession('password', $password);
            header('location: ' . BASE_URL);
        }

        $this->setViewData();
    }

    public function logout()
    {
        session_destroy();
        header('location: ' . BASE_URL);
    }

    private function setViewData()
    {
        $this->view->token            = Session::setToken();
        $this->view->data['username'] = Validation::getInputValue('username');
        $this->view->pageTitle        = 'Login';
        $this->view->render();
    }
}
