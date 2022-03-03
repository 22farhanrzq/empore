<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();

        if(request()->ajax())
        {
            return datatables()->of($users)
            ->addColumn('aksi', function($users)
            {
                $button = "<button class='edit btn btn-success' id='".$users->id."'>Edit</button> <button class='delete btn btn-danger' id='".$users->id."'>Hapus</button>";
                return $button;
            })
            ->rawColumns(['aksi'])
            ->make(true);
        }

        return view('users');
    }

    public function store(Request $request)
    {
        $user = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $user['password'] = bcrypt($user['password']);

        $store = User::create($user);

        if($store)
        {
            return response()->json([
                'store' => $store,
                'text' => 'Tambah user berhasil',
            ], 200);
        }else
        {
            return response()->json([
                'store' => $store,
                'text' => 'Tambah user gagal'
            ], 422);
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;

        $user = User::find($id);

        return response()->json(['user' => $user]);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $id = $request->id;

        $data = $request->validate([
            'name' => 'required',
            // 'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $update = User::find($id)->update($data);

        if($update)
        {
            return response()->json(['text' => 'User berhasil diubah'], 200);
        }else
        {
            return response()->json(['text' => 'User gagal diubah'], 422);
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;

        User::where('id', $id)->delete();

        return response()->json(['text' => 'User berhasil dihapus'], 200);
    }
}
