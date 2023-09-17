<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'family_name' => ['required', 'string', 'max:255'],
            'nickname' => ['string', 'max:255'],
            'is_name_public' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'gender' => 'required',
            'grade' => 'required',
        ]);

        if ($request->nickname === null) {
            $request->nickname = explode('@', $request->email, 2)[0];
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'family_name' => $request->family_name,
            'nickname' => $request->nickname,
            'is_name_public' => $request->is_name_public,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'grade' => $request->grade,
            'preferred_class_per_day' => $request->preferred_class_per_day,
            'preferred_studying_day_per_week' => $request->preferred_studying_day_per_week,
            'purpose' => $request->purpose,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
