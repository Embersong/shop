<?php

class AboutController extends Controller
{

    function __construct()
    {
        parent::__construct();
		    $this->view = 'about';
        $this->title .= ' | О сайте';
    }


}