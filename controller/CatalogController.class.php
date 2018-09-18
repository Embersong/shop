<?php

class CatalogController extends Controller
{

    function __construct()
    {
        parent::__construct();
		$this->view = 'catalog';
        $this->title .= ' | Каталог';
    }

	 public function index($data)
    {

        return ['catalog' => Catalog::getCatalog()];
    }

}