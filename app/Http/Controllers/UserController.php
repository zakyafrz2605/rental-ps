<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexRegister()
    {
        return Response()->view('auth.register');
    }

    public function indexLogin()
    {
        return Response()->view('auth.login');
    }

    public function indexAdmin()
    {
        return Response()->view('admin.index');
    }

    public function createUser(Request $request)
    {
        $nomor_telepon = User::where('nomor_telepon', $request->input('nomor_telepon'))->first();
        $email = User::where('email', $request->input('email'))->first();

        if (!empty($nomor_telepon)) {
            return back()->withInput()->withErrors(['error' => 'Nomor telepon sudah ada']);
        } else if (!empty($email)) {
            return back()->withInput()->withErrors(['error' => 'Email sudah ada']);
        } else {
            User::create([
                'nama' => $request->input('nama'),
                'nomor_telepon' => $request->input('nomor_telepon'),
                'alamat' => $request->input('alamat'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);
        }

        return redirect('/login');
    }

    public function userLogin(Request $request)
    {
        $result = Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        
        if ($result) {
            Session::regenerate();
            if(Auth::user()['role'] == 'admin') {
                return redirect('/admin');
            }
            return redirect('/rental');
        } else {
            return back()->withInput()->withErrors(['error' => 'Email/Password salah']);
        }
    }
    
    /**
     * Display the specified resource.
     */
    public function getUsers(User $user)
    {
        $users = User::select(['id', 'nama', 'nomor_telepon', 'alamat', 'email'])->get();
        return Response()->view('user.index', ['users' => $users]);
    }

    public function getUser(Request $request, User $user, $id)
    {
        $user = User::query()->where('id', $id)->get();
        return Response()->view('user.edit', ['user' => $user]);
    }

    public function editUser(Request $request, User $user, $id)
    {
        $user = User::query()->find($id);
        $nomor_telepon = User::where('nomor_telepon', $request->input('nomor_telepon'))->first();
        $email = User::where('email', $request->input('email'))->first();

        if (!empty($nomor_telepon) && $user['id'] != $nomor_telepon['id']) {
            if ($user['id'] != $nomor_telepon['id']) {
                return back()->withInput()->withErrors(['error' => 'Nomor telepon sudah ada']);
            }
        } else if (!empty($email) && $user['id'] != $email['id']) {
            if ($user['id'] != $email['id']) {
                return back()->withInput()->withErrors(['error' => 'Email sudah ada']);
            }
        }
        
        User::where('id', $id)->update([
            'nama' => $request->input('nama'),
            'nomor_telepon' => $request->input('nomor_telepon'),
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
        ]);
        
        if (!empty($request->input('password'))) {
            User::where('id', $id)->update([
                'password' => Hash::make($request->input('password')),
            ]);
        }
        return redirect('/user');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function deleteUser(User $user, $id)
    {
        $foreignExists = Rental::where('id_customer', $id)->get();

        if (!empty($foreignExists[0])) {
            return back()->withErrors(['error' => 'User memiliki rental yang masih berlaku']);   
        }

        $user = User::where('id', '=', $id);
        $user->delete();
        return redirect('/user');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function logout(User $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
