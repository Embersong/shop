<?php

class News extends Model
{
    public static function getNews()
    {
       return db::getInstance()->Select("SELECT * FROM news");

    }
}