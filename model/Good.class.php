<?php

class Good extends Model {
   
    public static function getGoods($categoryId)
    {
        return db::getInstance()->Select(
            'SELECT id_good, id_category, `name`, price FROM goods WHERE id_category = :category AND status=:status',
            ['status' => Status::Active, 'category' => $categoryId]);
    }

    public function getGoodInfo(){
        return db::getInstance()->Select(
            'SELECT * FROM goods WHERE id_good = :id_good',
            ['id_good' => (int)$this->id_good]);
    }

    public static function getGoodPrice($id_good){
        $result = db::getInstance()->Select(
            'SELECT price FROM goods WHERE id_good = :id_good',
            ['id_good' => $id_good]);

        return (isset($result[0]) ? $result[0]['price'] : null);
    }
}