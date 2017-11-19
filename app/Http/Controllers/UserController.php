<?php

namespace App\Http\Controllers;

use App\Transformer\UserTransformer;
use App\Repository\UserRepository;
//use \Laravel\Passport\Bridge\UserRepository;

use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    use Helpers;

    protected $userRepository;
    protected $userTransformer;

    public function __construct(UserRepository $userRepository,UserTransformer $userTransformer){
        $this->userRepository = $userRepository;
        $this->userTransformer = $userTransformer;
        $this->middleware('auth:api',['except'=>['show']]);
    }


    public function show(){
        $user = $this->userRepository->getAll();
        $response = $this->response->item($user,new UserTransformer());
        return $response;
    }

    public function showUser($id){
        $user = $this->userRepository->getById($id);
        $response = $this->response->item($user,new UserTransformer());
        return $response;
    }


}
