<?php

namespace libs;

class App
{
    private $request_method;
    private $route;
    protected $controller;
    protected $action;
    protected $params = [];

    public function __construct(string $request_method, string $route)
    {
        $this->request_method = $request_method;
        $this->route          = $route;
        $this->controller     = $this->getController();
        $this->action         = $this->getAction();
        $this->params         = $this->getParams();
    }

    private function getController()
    {
        if (isset($this->route)) {
            return '\controllers\\' . Router::getRoute($this->route, $this->request_method, 'controller');
        }
    }

    private function getAction()
    {
        if (isset($this->route)) {
            return Router::getRoute($this->route, $this->request_method, 'action');
        }
    }

    private function getParams()
    {
        $params = [];
        if ( ! empty($_GET)) {
            foreach ($_GET as $k => $v) {
                if ($k != 'route') {
                    $params[$k] = $v;
                }
            }
        }

        return $params;
    }

    public function startApp()
    {
        $this->controller = new $this->controller;
        call_user_func_array([$this->controller, $this->action], $this->params);
    }
}
