<?php
 namespace App\Repository;
 use Illuminate\Http\Request;
 use JWTAuth;
 use App\Models\User;
 use Hash;
 use JWTAuthException;
use Tymon\JWTAuth\Exceptions\JWTException;

class AdminRepository
{
	 public function __construct(User $user)
	 {
	 	 $this->user = $user;
	 }
	 /**
	  * Register function  
	  *
	  */
	 public function apiRegister($data)
	 {
	 	 $user = $this->user->create([
	 	 	'firstName'=> $data['firstName'],
	 	 	'lastName' => $data['lastName'],
	 	 	'email'=>$data['email'],
	 	 	'password'=>Hash::make($data['password']),
			'phone'=>$data['phone'],
			'userName'=>$data['firstName'],
			'user_type'=>'user'
	 	 ]);
	 	 if($user)
	 	 {
	 	 	 return true;

	 	 }else{
	 	 	return false;
	 	 }
	 }
	 /**
	  *  user login api 
	  */
	 public function apiLogin($data)
	 {
		 
		 $user = User::where('email', $email)->first();
		 
		 if($user!=null)
		 {
			 $token = JWTAuth::fromUser($user);
			 // $id = $user->id;
			//  $otp = $this->generateOTP();
			//  $updateotp = $user->update(['otp'=>$otp]);
			// // 
			 return ['status'=>true,'message'=>'User Login successfully'];
		 }else
		 {
			 return ['status'=>false,'type'=>400,'message'=>'mobile number does not exists,Register first'];
		 }

	 }
    // public function generateOTP()
    // {
    //     $otp = mt_rand(1000,9999);
    //     return $otp;
    // }
	
	/**
	* To get token from users object
	* @param user object
	* @response return token
	**/
	public function getTokenFromUser($user){
		$token = JWTAuth::fromUser($user);
		return $token;
	}
	 
}