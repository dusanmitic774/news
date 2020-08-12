<?php

namespace libs;

class Controller
{
    protected $view;

    public function modelObj($modelName)
    {
        return new $modelName();
    }

    public function viewObj($viewName, $data = [])
    {
        $this->view = new View($viewName, $data);

        return $this->view;
    }
}
