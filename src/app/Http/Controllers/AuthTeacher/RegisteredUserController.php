<?php

namespace App\Http\Controllers\AuthTeacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
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
        return view('auth_teacher.register');
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Teacher::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'gender' => 'required',
            'affiliation' => ['required', 'string', 'max:255'],
            'grade' => 'required',
        ]);


        $user = Teacher::create([
            'first_name' => $request->first_name,
            'family_name' => $request->family_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'affiliation' => $request->affiliation,
            'grade' => $request->grade,
            'teaching_history' => $request->teaching_history,
            'achievement' => $request->achievement,
            'introduction' => $request->introduction,
        ]);

        event(new Registered($user));

        Auth::guard('teacher')->login($user);

        return redirect(RouteServiceProvider::TEACHER_HOME);
    }
}
