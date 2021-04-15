<?php

class Router 
{
    public $uri;
    public $param;
    public $controller;
    public $method;

    public function __construct()
    {
        $this->setUri();
        $this->setController();
        $this->setMethod();
        $this->setParam();
    }

    public function setUri()
    {
        $this->uri=explode('/', $_SERVER(['REQUEST_URI']));
    }

    public function setController()
    {
        $this->controller= $this->uri[2] === '' ? 'Home' : $this->uri[2];
    }
    
}