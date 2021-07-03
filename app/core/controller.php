<?php


class controller
{

    private $model;
    private $view;

    function load_model(string $model): object
    {
        $proposed_model = dirname(__DIR__, 1)."/models/{$model}.php";
        if(file_exists($proposed_model)){
            require_once($proposed_model);
            return new $model;
        }
    }

    function view(string $view, array $data): void
    {
        $class = get_class($this);
        $proposed_view = dirname(__DIR__, 1)."/views/{$class}/{$view}.php";
        if(file_exists($proposed_view)){
            require_once($proposed_view);
        }
    }
    
}
