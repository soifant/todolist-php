<?php

class controller{
	public function view($view, $data=[]){
		
		if($_SESSION['user']){
		
			require_once 'app/view/'.$view.'.php';
		
		}else if($view == 'user/daftar'){
		
			require_once 'app/view/'.$view.'.php';
		
		}else{
		
			require_once 'app/view/user/masuk.php';
		
		}
	}
	
	public function model($model){
		require_once 'app/model/'.$model.'.php';
		return new $model;
	}
	

}

?>
