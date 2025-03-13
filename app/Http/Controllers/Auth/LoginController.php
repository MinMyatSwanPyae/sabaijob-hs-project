<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    protected function redirectTo()
    {
        if (Auth::user()->role === 'admin') {
            return '/admin/vacancies'; // Redirect admins to the admin dashboard
        }
        return '/home'; // Redirect standard users to the home page
    }

    // You may also want to override the login method if you need custom logic
    public function login(Request $request)
    {
        // Your login validation and authentication logic here

        // After login logic
        return redirect($this->redirectTo());
    }
}

