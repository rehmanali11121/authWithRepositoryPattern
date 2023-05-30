<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\User\AuthRepository;
class LoginController extends Controller
{
    private $repository;
    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }
    public function loginUser(Request $request)
    {
        return $this->repository->attemptLogin($request);
    }
    public function logoutUser(Request $request)
    {
        return $this->repository->attemptLogout($request);
    }

}
