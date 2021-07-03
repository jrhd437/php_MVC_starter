<?php

class home extends controller
{
    public function default($params = [])
    {
        $this->index($params);
    }

    public function index($params = [])
    {
        $user = $this->load_model('user');

        $this->view("index", ["username" => $user->username]);
    }

    public function page($params = [])
    {
        $user = $this->load_model('user');

        # require a param
        if(!isset($params[0])){
            $this->error_404();
        }

        $this->view("page", ["username" => $user->username, "param1" => $params[0]]);
    }

    public function error_404()
    {
        $this->view("error_404", []);
        exit(); # make sure to exit. We don't need to include 2 pages.
    }

}