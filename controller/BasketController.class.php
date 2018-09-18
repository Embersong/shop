<?php

class BasketController extends Controller
{

    function __construct()
    {
        parent::__construct();
		$this->view = 'basket';
        $this->title .= ' | Корзина';
    }

	
	public function buy() {
		$id_good = (int)$_POST['id_good'];
		$id_session = session_id();
		Basket::add($id_good,$id_session);
		header("Location: /geekbrains/public/catalog/");
	}

	public function index($data)
    {
        return ['goods' => Basket::getBasket(), 'price' => Basket::summBasket()];
    }
}