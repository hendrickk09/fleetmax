<?php

<<<<<<< HEAD

=======
>>>>>>> 3de785ae189018f88177b44d4d0e77c2b2cfd867
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
<<<<<<< HEAD
use App\Providers\RouteServiceProvider;
=======
>>>>>>> 3de785ae189018f88177b44d4d0e77c2b2cfd867
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
<<<<<<< HEAD
=======
    /**
     * Display the registration view.
     */
>>>>>>> 3de785ae189018f88177b44d4d0e77c2b2cfd867
    public function create(): View
    {
        return view('auth.register');
    }

<<<<<<< HEAD
=======
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
>>>>>>> 3de785ae189018f88177b44d4d0e77c2b2cfd867
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cnpj' => ['required', 'string', 'max:14', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'cnpj' => $request->cnpj,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
