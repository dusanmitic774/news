<?php

namespace libs;

class View
{
    public $fileName;
    public $data;
    public $active = false;
    public $exists = false;

    public function __construct($fileName, $data)
    {
        $this->fileName = $fileName;
        $this->data     = $data;
    }

    public function render()
    {
        if (file_exists(VIEWS . $this->fileName . '.php')) {
            include VIEWS . $this->fileName . '.php';
        }
    }
}
