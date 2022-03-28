<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.user.index', [
            "title" => "User",
            "users" => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.user.create', [
            "title" => "Create User",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return dd($request->all());
        $validasi = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|max:255|unique:users|email:rfc,dns',
            'password' => 'required|string|min:5',
            'role' => 'required',
        ]);

        $validasi['password'] = bcrypt($request->password);
        $validasi['role'] = $request->role;

        User::create($validasi);

        return redirect('/dashboard/users')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (auth()->user()->id == 1) {
            return view('dashboard.user.edit', [
                "title" => "Edit User",
                "user" => $user,
            ]);
        }elseif($user->id == auth()->user()->id) {
            return redirect('/dashboard/users')->with('error', 'Tidak dapat mengedit data sendiri!');
        }elseif($user->id == 1) {
            return redirect('/dashboard/users')->with('error', 'Tidak dapat mengedit data SuperAdmin!');
        }else{
            return view('dashboard.user.edit', [
                "title" => "Edit User",
                "user" => $user,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // return dd($request->all());
        $request->validate([
            'role' => 'required',
        ]);

        User::where('id', $request->id)->update([
            'role' => $request->role,
        ]);

        return redirect('/dashboard/users')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->id == auth()->user()->id) {
            return redirect('/dashboard/users')->with('error', 'Tidak dapat menghapus data sendiri!');
        }elseif($user->id == 1) {
            return redirect('/dashboard/users')->with('error', 'Tidak dapat menghapus data SuperAdmin!');
        }else{
            $user->delete();
            return redirect('/dashboard/users')->with('success', 'Data berhasil dihapus!');
        }
    }
}
