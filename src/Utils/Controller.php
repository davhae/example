<?php

namespace davhae\example\Utils;


class Controller
{
    public $layout;

    public function __construct()
    {
        $this->layout = new Layout();
    }

    /**
     * @return string
     *
     * Returns the standard frontend
     */
    public function index(): string
    {
        $view = $this->layout->getFrontend('app');
        return $view;
    }

    /**
     * @param $vueComponent
     * @return string
     *
     * Handles API calls
     */
    public function main($vueComponent)
    {
        $view = $this->layout->getFrontend($vueComponent);
        return $view;
    }
}