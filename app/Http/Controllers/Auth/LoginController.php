<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\AuthRepository;
class LoginController extends Controller
{
    private $repository;
    public function __construct(AuthRepository $repository)
    {
            $this->repository = $repository;
    }
    public function loginUser(Request $request)
    {
        $user=$this->repository->attemptLogin($request);
        return $user ? true : false;
    }
    public function logoutUser(Request $request)
    {
        $user=$this->repository->attemptLogout($request);
        return $user? true : false;
    }

}
