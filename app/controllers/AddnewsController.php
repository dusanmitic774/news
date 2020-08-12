<?php

namespace controllers;

use libs\Authentication;
use libs\Controller;
use libs\Session;
use libs\Validation;

class AddnewsController extends Controller
{
    public function showPage()
    {
        $this->viewObj('addnews/addnews');
        $newsModel      = $this->modelObj('\models\News');
        $userModel      = $this->modelObj('\models\User');
        $authentication = new Authentication($userModel);

        if ($authentication->isAdmin($authentication->getLoggedInUser()->username)) {
            $this->setViewData($userModel, $newsModel);
        } else {
            http_response_code(404);
            include VIEWS . 'error/error.php';
            die();
        }
    }

    public function addNews()
    {
        $userModel = $this->modelObj('\models\User');
        $newsModel = $this->modelObj('\models\News');
        $this->viewObj('addnews/addnews');
        $authentication = new Authentication($userModel);
        $validation     = new Validation;

        $input = $validation->escapeInput($_POST);

        $title    = $input['title'];
        $text     = $input['text'];
        $author   = $input['author'];
        $category = $input['category'];
        $image    = $_FILES['image']['name'];
        if ($image) {
            $imageName      = uniqid(explode('.', $_FILES['image']['name'])[0]);
            $imageExtention = explode('.', $_FILES['image']['name'])[1];
            $image          = $imageName . '.' . $imageExtention;
        }

        (move_uploaded_file($_FILES['image']['tmp_name'], ROOT . '/images/' . $image));

        $validation->checkInput();
        if ($authentication->isAdmin($authentication->getLoggedInUser()->username)) {
            if ($validation->isInputValid()) {
                if ($validation->isTokenValid()) {
                    $newsModel->addNews([
                        $newsModel::TITLE    => $title,
                        $newsModel::TEXT     => $text,
                        $newsModel::AUTHOR   => $author,
                        $newsModel::CATEGORY => $category,
                        $newsModel::IMAGE    => $image,
                    ]);
                    header('location: ' . BASE_URL);
                }
            } else {
                $this->view->data['errors'] = $validation->getErrors();
            }
        } else {
            http_response_code(404);
            include VIEWS . 'error/error.php';
            die();
        }

        $this->setViewData($userModel, $newsModel);
    }

    private function setViewData($userModel, $newsModel)
    {
        $this->view->token            = Session::setToken();
        $this->view->data['topics']   = $newsModel->getTopics();
        $this->view->pageTitle        = 'Post News';
        $this->view->data['text']     = Validation::getInputValue('text');
        $this->view->data['title']    = Validation::getInputValue('title');
        $this->view->data['author']   = Validation::getInputValue('author');
        $this->view->data['category'] = Validation::getInputValue('category');
        $this->view->render();
    }
}
