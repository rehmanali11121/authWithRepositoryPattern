<?php
namespace App\Http\Repositories;
use App\Http\Repositories\RepositoryInterfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserRepository implements UserRepositoryInterface
{
    public function getAllUsers()
    {
        return User::all();
    }
    public function getUserById($data)
    {
        return User::where("id", $data->id)->first();
    }
    public function createUser($data)
    {
        $name=$data->name;
        $email=$data->email;
        $password=Hash::make($data->password);
        $responseId=User::create([
                "name"=>$name,
                "email"=>$email,
                "password"=>$password,
            ]);
            return !!$responseId;
    }
    public function updateUser($data)
    {
        $name=$data->name;
        $email=$data->email;
        $responseId=User::where('id',$data->id)
        ->update([
                "name"=>$name,
                "email"=>$email,
            ]);
            return $responseId;
    }
    public function updateUserPassword($data)
    {
        $password=Hash::make($data->password);
        $responseId=User::where('id',$data->id)
        ->update([
                "password"=>$password,
            ]);
            return $responseId;
    }
    public function deleteUser($data)
    {
        $responseId=User::where('id',$data->id)->delete();
            return $responseId;
    }
    
    
}