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
					echo '
					<div class="container">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						'.$ses[1].' gagal
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					</div>
					';
				
				}else{
					echo '
					<div class="container">
					<div class="alert alert-success alert-dismissible fade show" role="alert">
					'.$ses[1].' berhasil
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					</div>
					';
			}
		}
	}
	

}
?>
