<?php
namespace App\Http\Repositories\RepositoryInterfaces;
interface UserRepositoryInterface 
{
    public function getAllUsers();
    public function getUserById($data);
    public function createUser($data);
    public function updateUser($data);
    public function updateUserPassword($data);
    public function deleteUser($data);  
}