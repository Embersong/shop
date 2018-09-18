<?php

class Show_goodController extends Controller
{
	protected $good;

    function __construct()
    {
        parent::__construct();
		$this->view = 'show_good';
       	$this->good =  Catalog::getCatalogItem($_GET['idx']);
		$this->title .= ' | Товар - '. $this->good['name'];
    }

	 public function index($data)
    {

        return ['good' => $this->good];
    }

}