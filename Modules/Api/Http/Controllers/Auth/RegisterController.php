<?php

namespace Modules\Api\Http\Controllers\Auth;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Repository\UserRepository;
use Modules\Api\Http\Controllers\Controller;
use Modules\Api\Http\Requests\RegisterRequest;


class RegisterController extends Controller
{
    public function __construct(UserRepository $userRepo)
    {
         $this->userRepo = $userRepo;
    }
 
    /**
     * To Register the user .
     * @return Renderable
     */
    public function apiRegister(RegisterRequest $request)
    {
       
        $user = $this->userRepo->apiRegister($request->all());
        if($user)
        {
            $this->setMessage('User register Successsfully');
            $this->setResponseData(['User register Successsfully']);
            return $this->toResponse();
        }else{
             $this->setMessage('User Register failed');
             $this->setErrors(['error'=>'User Register failed']);
             return $this->toResponse();
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('api::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('api::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('api::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
