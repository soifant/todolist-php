<?php

class App{
	//Property
	private $controller = 'home',
			$model = 'index',
			$params = [];
	
	//Method
	public function __construct(){
		$url = $this->getUrl();
		
		if(file_exists('app/controller/'.$url[0].'.php')){
			$this->controller = $url[0];
			unset($url[0]);
		}
		
		
		require_once 'app/controller/'.$this->controller.'.php';
		$this->controller = new $this->controller;
		
		if(isset($url[1])){
			if(method_exists($this->controller, $url[1])){
				$this->model = $url[1];
				unset($url[1]);
			}
		}
		
		if(!empty($url)){
			$this->params = array_values($url);
		}
		
		
		
		call_user_func_array([$this->controller, $this->model], $this->params);
	}



	//Mengambil url
	public function getUrl(){
		if($_GET['url']){
		
			$url = $_GET['url'];
			$url = rtrim($url, '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			
		
		if($_SESSION['user']){
		
			return $url;
			
		}else{
		
			

		if($url[1] == 'masuk'){
		
			return $url = ['user', 'masuk'];
		
		}else if($url[1] == 'daftar'){
		
			return $url = ['user', 'daftar'];
		
		}else{
		
			switch($url[2]){
		
				case 'daftar':
				return $url = $url;
				break;
				
				default:
				return $url = ['user', 'index', 'masuk'];
				break;
			}
		
		}
	}
}
}
}
?>
