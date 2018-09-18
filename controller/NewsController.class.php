<?php

class NewsController extends Controller
{
	
	function __construct()
    {
        parent::__construct();
		$this->view = 'news';
        $this->title .= ' | Новости';
    }

    public function index($data)
    {	
        return ['news' => News::getNews()];
    }


}