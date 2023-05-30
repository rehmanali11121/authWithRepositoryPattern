<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\UserRepository;
class Usercontroller extends Controller
{
    private $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
    public function getAllUsers()
    {
        return response()->json($this->repository->getAllUsers());
    }
    public function getUserById(Request $request)
    {
        return response()->json($this->repository->getUserById($request));
    }
    public function createUser(Request $request)
    {
        return response()->json($this->repository->createUser($request));
    }
    public function updateUser(Request $request)
    {
       return response()->json($this->repository->updateUser($request));
    }
    public function updateUserPassword(Request $request)
    {
        return response()->json($this->repository->updateUserPassword($request));
    }
    public function deleteUser($data)
    {
        return response()->json($this->repository->deleteUser($data));
    }
}
