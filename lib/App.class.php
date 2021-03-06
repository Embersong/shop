<?php

class App 
{
    public static function Init() 
    {
        date_default_timezone_set('Europe/Moscow');
        db::getInstance()->Connect(Config::get('db_user'), Config::get('db_password'), Config::get('db_base'));

        if (php_sapi_name() !== 'cli' && isset($_SERVER) && isset($_GET)) {
            self::web(isset($_GET['path']) ? $_GET['path'] : '');
        }
    }

    protected static function web($url)
    {
		
		//echo $url;
        $url = explode("/", $url);
		
		//print_r($url);
		
        if (!empty($url[0])) {
            $_GET['page'] = $url[0];
            if (isset($url[1])) {
                if (is_numeric($url[1])) {
                    $_GET['id'] = $url[1];
                } else {
                    $_GET['action'] = $url[1];
                }
                if (isset($url[2])) {
                    $_GET['id'] = $url[2];
                }
            }
        }
        else{
            $_GET['page'] = 'Index';
        }

        if (isset($_GET['page'])) {
            $controllerName = ucfirst($_GET['page']) . 'Controller';
            $methodName = isset($_GET['action']) ? $_GET['action'] : 'index';
            $controller = new $controllerName();
			
		        /* временный костыль */
		        $menu = [
              '/geekbrains/public/' => 'Главная',
              '/geekbrains/public/catalog/' => 'Каталог',
              '/geekbrains/public/about/' => 'О сайте',
              '/geekbrains/public/cabinet/' => 'Кабинет',
              '/geekbrains/public/contacts/' => 'Контакты',
              '/geekbrains/public/basket/' => 'Корзина',
              '/geekbrains/public/news/' => 'Новости',
            ];
			      /* //временный костыль */
			      
            $data = [
                'menu' => $menu,
				        'isAuth' => User::isAuth(),
                'content_data' => $controller->$methodName($_GET),
                'title' => $controller->title
            ];
			
		
			
            $view = $controller->view . '/' . $methodName . '.html';
			
            if (!isset($_GET['asAjax'])) {
                $loader = new Twig_Loader_Filesystem(Config::get('path_templates'));
                $twig = new Twig_Environment($loader);
                $template = $twig->loadTemplate($view);
			
			//echo "<pre>";print_r($data);echo "</pre>";

                echo $template->render($data);
            } else {
                echo json_encode($data);
            }
        }
    }


}