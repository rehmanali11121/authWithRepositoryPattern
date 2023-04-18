<?php
namespace App\Http\Repositories\RepositoryInterfaces;
interface AuthRepositoryInterface 
{
    public function registerWithEmail($data);
    public function registerWithPhone($data);
    public function attemptLogin($data);
    public function logout($data);
    public function findById($data);
    public function findByEmail($data);
    public function findByPhone($data);
    
}