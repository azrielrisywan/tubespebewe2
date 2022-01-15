<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        try {
            $karyawans = \DB::table('karyawan')
                ->select('nama')
                ->where('role', '=', null)
                ->get()
                ->toArray();
            if ($karyawans == null) {
                Alert::info('Info', 'Semua karyawan sudah menjadi admin!');
                return back();
            }
        } catch (\Exception $e) {
            Alert::info('Error!', $e->getMessage());
            return back();
        }
        return view('auth.register', compact('karyawans'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $get_id = \DB::table('karyawan')
            ->select('id')
            ->where('nama', '=', $request->name)
            ->distinct()
            ->get();
        foreach ($get_id as $data) {
            $karyawan_id = $data->id;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'karyawan_id' => $karyawan_id
        ]);

        event(new Registered($user));

        Auth::login($user);

        \DB::table('karyawan')
            ->where('nama', '=', $request->name)
            ->update(['role' => 'admin']);

        return redirect(RouteServiceProvider::HOME);
    }
}
