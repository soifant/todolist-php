<?php

class controller{
	public function view($view, $data=[]){
		
		require_once 'app/view/'.$view.'.php';
	}
	
	public function model($model){
		
		require_once 'app/model/'.$model.'.php';
		return new $model;
	}
	
	public function alert(){
	
			$ses = $_SESSION['alert'];
		
			if($ses){
				unset($_SESSION['alert']);
				if($ses[0] == 'gagal'){
					echo $ses[1]." gagal";
				
				}else{
					echo $ses[1]." berhasil";
			}
		}
	}
	

}
?>
