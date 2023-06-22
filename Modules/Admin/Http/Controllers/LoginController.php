<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function login()
    {
        return view('admin::auth.login');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function authenticate(Request $request)
    {
        

      if (Auth::attempt(['userName' => $request->input('userName'), 'password' => $request->input('password')]))
        {
           
            Auth::login(Auth::user());
            $user = Auth::user();
            
            if($user->user_type == 'admin'){
                return redirect()->route('dashboard');
            }else{
                return redirect()->route('admin.login');
            }
            
            
        } else {
          
           return back()->withErrors(['error'=>'Wrong Admin Credentials.']);
        }
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
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
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
     protected function redirectTo()
      {
      if (Auth::user()->user_type == 'admin')
      {
        return 'admin/dashboard';  // admin dashboard path
      } else {
        return 'home';  // member dashboard path
      }
     }
}
