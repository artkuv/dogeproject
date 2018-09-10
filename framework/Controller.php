<?php

namespace Framework;

abstract class Controller
{
    public function __construct()
    {
        $this->before();
    }

    public function __destruct()
    {
        $this->after();
    }

    protected function before()
    {
        
    }

    protected function after()
    {
        // code
    }

    protected function redirect(string $link): void
    {
        header("Location: " . $link);
        die();
    }

}