<?php
namespace Modules\Api\Http\Controllers;

use App\Models\User;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Api\Http\Controllers\Controller;
use App\Traits\ResponseTrait;
class ApiController extends Controller
{
    use ResponseTrait;

    public function __construct()
    {
        
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('api::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('api::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('api::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('api::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        
    }
    /**
     * to get last migration id from migration table to convert app version
     * @param 
     * @return Response migration id
     */
    public  function getState(){
        $state = \DB::table('migrations')->orderBy('id','DESC')->select('id as db')
                ->first();
        $this->setMessage('State version');
        $this->setResponseData([$state]);
        return $this->toResponse();    
    }

    public function send_mail(Request $request)
    {
        $user =  new User();
        $repo = new UserRepository($user);
        $template =   view('emails.test')->with(['newdata'=> $user])->render();

        $repo->send_mail($request->user_email,$request->user_name,$template,$request->subject);
    }



}
