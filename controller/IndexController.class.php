<?php

class IndexController extends Controller
{

    function __construct()
    {
        parent::__construct();
		$this->view = 'index';
        $this->title .= ' | Главная';
    }


}