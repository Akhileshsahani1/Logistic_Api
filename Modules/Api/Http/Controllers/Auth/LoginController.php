<?php

namespace Modules\Api\Http\Controllers\Auth;
use App\Models\Userd;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Api\Http\Controllers\Controller;
use App\Services\AuthService;
use Modules\Api\Http\Requests\LoginRequest;


class LoginController extends Controller
{

    public $authService;

    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }
    /*
      *login api
      *
    */
    public function apiLogin(LoginRequest $request)
    {

        $login = $this->authService->apiLogin($request->all());

        if($login['status']==true)
        {
            $this->setMessage('User login Successsfully');
            $this->setResponseData(['userid'=>$login['userid'],'otp'=>$login['otp']]);
            return $this->toResponse();
        }else{
             $this->setMessage('User login failed');
             $this->setErrors(['error'=>'User login failed']);
             return $this->toResponse();
        }   
    }
    public function apiLogout()
    {
       Auth::logout();
       $this->setMessage('User logout Successfully');
       $this->setResponseData(['user logout successfully']);
       return $this->toResponse();
    }
    public function apiVerify(Request $request)
    {

        $verify = $this->authService->apiVerify($request);
        if($verify['status']==true)
        {
           $this->setMessage($verify['message']);
           $this->setResponseData(['apiToken'=>$verify['apiToken'],'userId'=>$verify['userid']]);
            $this->setstatus(200);
           return $this->toResponse();
        }else{
           $this->setMessage($verify['message']);
           $this->setErrors(['error'=>$verify['message']]);
            $this->setstatus($verify['type']);
           return $this->toResponse();
        }
    }

    
}
