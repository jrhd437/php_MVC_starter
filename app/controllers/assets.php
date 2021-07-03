<?php

class assets extends controller
{
    public function default($params = [])
    {
        $this->css($params);
    }

    public function css($params = [])
    {
        $filename = (isset($params[0])) ? strtolower(trim($params[0])) : $this->error_404();
        $proposed_file = dirname(__DIR__, 1)."/views/css/{$filename}";
        if(file_exists($proposed_file)){
            header("Content-Type: text/css");
            echo file_get_contents($proposed_file);
        }
    }

    public function js($params = [])
    {
        $filename = (isset($params[0])) ? strtolower(trim($params[0])) : $this->error_404();
        $proposed_file = dirname(__DIR__, 1)."/views/js/{$filename}";
        if(file_exists($proposed_file)){
            echo file_get_contents($proposed_file);
        }
    }

    public function images($params = [])
    {
        $filename = (isset($params[0])) ? strtolower(trim($params[0])) : $this->error_404();
        $proposed_file = dirname(__DIR__, 1)."/images/js/{$filename}";
        if(file_exists($proposed_file)){
            echo file_get_contents($proposed_file);
        }
    }

    public function error_404()
    {
        $this->view("error_404", []);
        exit(); # make sure to exit. We don't need to include 2 pages.
    }

}