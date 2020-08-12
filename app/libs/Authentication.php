<?php

namespace libs;

class Authentication
{
    private const ADMIN = 'admin';

    private $userModel;
    private $errors = [];

    public function __construct(\models\User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function verifyLogin($username, $password)
    {
        $user = $this->userModel->getByUsername($username);
        if ( ! empty($user)) {
            if (password_verify($password, $user[0]->password)) {
                return true;
            }
        }
        $this->errors[] = 'Wrong credentials';

        return false;
    }

    public function isLoggedIn()
    {
        if (Session::sessionExists('username') && ! empty(Session::sessionExists('username'))) {
            return true;
        }
        $this->errors[] = 'You are not logged in';

        return false;
    }

    public function getLoggedInUser()
    {
        if ( ! empty($this->userModel->getByUsername(Session::getSession('username')))) {
            return $this->userModel->getByUsername(Session::getSession('username'))[0];
        }

        return false;
    }

    public function isAdmin($username)
    {
        $user = $this->userModel->getByUsername($username);
        if ($username == self::ADMIN) {
            if ($user[0]->admin == 1) {
                return true;
            }
        }

        return false;
    }

    public function userAlreadyExists($username)
    {
        $user = $this->userModel->getByUsername($username);
        if (empty($user)) {
            return false;
        }
        $this->errors[] = 'Username already exists';

        return true;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
