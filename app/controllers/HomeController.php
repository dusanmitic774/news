<?php

namespace controllers;

use libs\Controller;

class HomeController extends Controller
{
    public function index($topic = '')
    {
        $this->viewObj('home/home');
        $newsModel = $this->modelObj('\models\News');

        $this->view->data['topics'] = $newsModel->getTopics();
        $this->view->pageTitle      = 'Home';

        if ($topic) {
            $this->view->exists       = true;
            $this->view->flex         = 'clearflex';
            $this->view->active       = true;
            $this->view->data['news'] = $newsModel->getByTopic($topic)->getResults();
        } else {
            $news = $newsModel->getLastThree()->getResults();
            if ( ! empty($news)) {
                $this->view->exists = true;
            }
            $featuredNews                     = array_shift($news);
            $news                             = $news;
            $this->view->data['news']         = $news;
            $this->view->data['featuredNews'] = $featuredNews;
        }

        $this->view->render();
    }
}
