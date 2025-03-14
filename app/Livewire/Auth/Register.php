<?php
namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
    public $name, $email, $password, $password_confirmation;

    public function register()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create the user with "user" role by default
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => 'user', // Ensure the role is "user"
        ]);

        // Auto-login after registration
        Auth::login($user);

        // Redirect after registration based on role
        return redirect()->route($user->role === 'admin' ? 'admin.vacancies.index' : 'home')
            ->with('success', 'Registration successful.');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
