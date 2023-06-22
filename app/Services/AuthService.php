<?php
namespace App\Services;
use Auth;
use JWTAuth;
use JWTAuthException;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Events\ForgotPasswordEmail;
use App\Repository\UserRepository;
use App\Models\User;

class AuthService {

    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
       $this->userRepo = $userRepo;
    }
   /**
    * generating random otp 
    */
    public function apiLogin($request)
    {
    	$user = $this->userRepo->apiLogin($request);
        return $user;
    }
    
    
    public function apiVerify($request){
        $user= User::where('phone',$request->phone)->first();
          if (!isset($user)) {
            return ['status'=>false,'error'=>'Invalid user','type'=>400];
        }
        else{
            if($user->otp == trim($request->otp)){
                $token = $this->userRepo->getTokenFromUser($user);
                return ['status'=>true,'message'=>'Account Verify Successfully','apiToken'=>$token,'userid'=>$user->id,'type'=>200];
            }else{
                return ['status'=>false,'error'=>'Invalid otp','type'=>400];
                
            }
        }
    }
      
    
}
