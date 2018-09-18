<?php

class Basket extends Model {
   
    public function add($id_good,$id_session)
    {
        return db::getInstance()->Query(
            'INSERT INTO `basket` (`id_session`, `id_good`)
			VALUES (:id_session, :id_good);',
            ['id_good' => $id_good, 'id_session' => $id_session]);
    }
    public function summBasket()
    {
		$id_session = session_id();
        return db::getInstance()->Select(
            'SELECT sum(price) as sum FROM `basket`,`goods` WHERE basket.id_good=goods.id_good and `id_session`= :id_session;',
            ['id_session' => $id_session])[0]['sum'];
    }

    public function getBasket()
    {
		$id_session = session_id();

		return db::getInstance()->Select("SELECT * FROM `basket`,`goods` WHERE basket.id_good=goods.id_good AND id_session=:id_session", ['id_session' => $id_session]);
    }
}