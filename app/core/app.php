<?php

/*

    app is responsible to directing to the correct controller.
    it can be thought of as a controller-controller, or master-router.

*/

class app
{
    protected $controller = 'home';
    protected $method = 'default';
    protected $params = [];

    public function __construct()
    {
        $this->parseUrl();
        # pass the parameters to the chosen method of the chosen controller.
        call_user_func([$this->controller, $this->method], $this->params);
    }

    protected function setParams(array $params): void
    {
        # trim values and assign.
        if (is_array($params)) {
            $params = array_values($params);
            foreach ($params as $key => $value) {
                $params[$key] = trim($value);
            }
            $this->params = $params;
        }
    }

    public function parseUrl(): void
    {
        $request = [];
        # if there are get variables, grab 'em and explode them.
        if (isset($_GET['url'])) {
            $url = filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL);
            $request = explode("/", $url);
        }

        # we'll see what controller and method are being requested, or use the default ones.
        $proposed_controller = (isset($request[0])) ? $request[0] : $this->controller;
        $proposed_method = (isset($request[1])) ? $request[1] : $this->method;
        if(isset($request[0])){unset($request[0]);}
        if(isset($request[1])){unset($request[1]);}

        if (file_exists(dirname(__DIR__, 1) . "/controllers/{$proposed_controller}.php")) {
            $this->controller = $proposed_controller;
        }

        require_once(dirname(__DIR__, 1) . "/controllers/{$this->controller}.php");
        $this->controller = new $this->controller;

        if (method_exists($this->controller, $proposed_method)) {
            $this->method = $proposed_method;
        }

        $this->setParams($request);
    }
}
