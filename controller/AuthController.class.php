<?php

class AuthController extends Controller
{
	
	public function login() {
		//попытка входа через форму логина
		$login = $_POST['login'];
		$pass = $_POST['pass'];
		
		//проверим логин пароль, если подходят, авторизуем
		if (User::Check($login,$pass)) {
			$_SESSION["login"] = $login;
		}
		
		header("Location: /");
	}
	
	public function logout() {
		session_destroy();
		header("Location: /");
	}


}