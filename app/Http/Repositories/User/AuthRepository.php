<?php
namespace App\Http\Repositories\User;
use App\Http\Repositories\User\RepositoryInterfaces\AuthRepositoryInterface;
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
            'password' =>'required|string|min:6',
        ]);
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        return $user;
    }
    public function registerWithPhone($data)
    {
        $validated=$data->validate([
            'name' =>'required|string|max:255',
            'phone' =>'required|string|min:11|max:12|phone|unique:users',
            'password' =>'required|string|min:6',
        ]);
        $user = User::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
        ]);
        return $user;
    }
    public function attemptLogin($data)
    {
        $data->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required',
            ]);
            $credentials=$data->only('email','password');
            return Auth::guard('web')->attempt($credentials);
    }
    public function findById($data)
    {
        return User::where('id', $data['id'])->first();
    }
    public function findByEmail($data)
    {
        return User::where('email', $data['email'])->first();
    }
    public function findByPhone($data)
    {
        return User::where('phone', $data['phone'])->first();
    }
    public function attemptLogout($data)
    {
       return Auth::guard('web')->logout();
    }
    
    
}