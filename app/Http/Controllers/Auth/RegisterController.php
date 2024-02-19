<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:25000'],
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'gender' => ['nullable', 'in:male,female'],
            'birthdate' => ['nullable', 'date'],
            'relationship' => ['nullable', 'in:single,married,widow'],
            'address' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $photoName = null;
        if (isset($data['photo'])) {
            $photo = $data['photo'];
            $photoName = 'photo_' . time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images/profile_photos/'), $photoName);
        }
    
        return User::create([
            'photo' => $photoName,
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'gender' => $data['gender'] ?? null,
            'birthdate' => $data['birthdate'] ?? null,
            'relationship' => $data['relationship'] ?? null,
            'address' => $data['address'] ?? null,
            'description' => $data['description'] ?? null,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function registered(Request $request, $user)
    {
        Alert::success('Success!', 'You are successfully registered.')->autoclose(3000);
        return redirect($this->redirectPath());
    }
}
