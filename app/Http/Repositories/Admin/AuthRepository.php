<?php
namespace App\Http\Repositories\Admin;
use App\Http\Repositories\Admin\RepositoryInterfaces\AuthRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
class AuthRepository implements AuthRepositoryInterface
{
    public function registerWithEmail($data)
    {
        $validated=$data->validate([
            'name' =>'required|string|max:255',
            'email' =>'required|string|email|unique:users',
            'password' =>'required|string|min:6|confirmed',
        ]);
        $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);
        return $user;
    }
    public function registerWithPhone($data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return $user;
    }
    public function attemptLogin($data)
    {
        $data->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required',
            ]);
            $check=$data->only('email','password');
           
            $user=Auth::guard('web')->attempt($check);
            return $user;
            
    }
    public function findById($data)
    {
        $user = User::where('email', $data['email'])->first();
        if ($user) {
            $user->delete();
        }
    }
    public function findByEmail($data)
    {
        $user = User::where('email', $data['email'])->first();
        if ($user) {
            $user->delete();
        }
    }
    public function findByPhone($data)
    {
        $user = User::where('email', $data['email'])->first();
        if ($user) {
            $user->delete();
        }
    }
    public function attemptLogout($data)
    {
        $user=Auth::guard('web')->logout();
        return $user;
    }
    
    
}