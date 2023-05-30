<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\User\AuthRepository;
class RegisterController extends Controller
{
    private $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }
    public function registerWithEmail(Request $request)
    {
       
        $user = $this->authRepository->registerWithEmail($request);
        
        return !!$user;
    }
}
