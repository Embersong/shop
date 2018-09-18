<?php

class Catalog extends Model
{
    
	
    public static function getCatalog()
    {
       return db::getInstance()->Select("SELECT * FROM goods");

    }
	
    public static function getCatalogItem($idx)
    {
       return db::getInstance()->Select("SELECT * FROM goods WHERE id_good=:idx", ['idx' => (int)$idx])[0];

    }

  
}