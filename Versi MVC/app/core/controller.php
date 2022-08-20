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
	
	
	
	public function filter($user, $pass, $uMin = 3, $uMax = 16, $pMin = 6, $pMax = 31){
	
		if($pass == 'home'){
		$user = str_replace(" ", "", $user);
		}else{
		$user = $user;
		}
		
		$pass = $pass;
		//$email = $email;
		$patren = "/[a-z,0-9]/i";
		
		$user_minMax = strlen($user);
		$user_alfaNumerik = preg_match_all($patren, $user);
		$pass_minMax = strlen($pass);
		$pass_alfaNumerik = preg_match_all($patren, $pass);
		//$email_filter = filter_var($email, FILTER_VALIDATE_EMAIL);
		
		 if($user_minMax > $uMin &&
			$user_minMax < $uMax &&
			$user_alfaNumerik == $user_minMax &&
			$pass_minMax > $uMin && 
			$pass_minMax < $uMax && 
			$pass_alfaNumerik == $pass_minMax){
			//$email_filter == true
			return 1;
			
		}else{
			
			return 0;
		}
	}
	
	
	

}
?>
