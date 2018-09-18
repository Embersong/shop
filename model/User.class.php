<?php

class User extends Model {
   
   //проверка авторизован ли пользователь
    public static function isAuth()
    {
		//защита от воровства сессии, проверка заголовков
		if (isset($_SESSION['HTTP_USER_AGENT']))
		{
			if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT']))
			{
				session_destroy();
				header("Location: /");
			}
		}
		else
		{
			$_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']);
		}

		return isset($_SESSION["login"]);
	}
	
	//авторизация пользователя, вернет true если такой есть
	public static function Check($login, $pass)
    {
		$options = [
		'cost' => 11,
		'salt' => Config::get('hash')
	];
	
		$res=db::getInstance()->Select("SELECT * FROM users WHERE login=:login AND pass=:pass",
		['login' => $login, 'pass' => password_hash($pass, PASSWORD_BCRYPT, $options)]);
		
		return !empty($res);
			
	}
	
	public static function get_User() {
		return $_SESSION["login"];
	}
	

}