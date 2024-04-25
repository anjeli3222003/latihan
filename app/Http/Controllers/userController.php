<?php

namespace App\Http\Controllers;
use App\Models\ProfileModel;
use Illuminate\Http\Request;

class userController extends Controller

{ 
    
    public function index()
    {
        $profileModel = new ProfileModel();
        $db = $profileModel->alldata();
       
       
        // dd($db);
        
        return view('profile', compact('db'));
    }


    public function __construct()
    {
      $this->profileModel = new ProfileModel;
    }

    public function tambah()
    {
      return view('tambahuser');
    }

    public function add(Request $request)
    {
      $this->validate($request, [
        'nama' => 'required|min:3|max:50',
        'kontak' => 'required',
        'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
      ], [
        'nama.required' => 'Nama harus diisi',
        'nama.min' => 'Nama minimal 3 karakter',
        'nama.max' => 'Nama maksimal 50 karakter',

        'foto.image' => 'Foto harus berupa gambar',
        'foto.mimes' => 'Format foto hanya bisa jpg, png, gif, atau svg',
        'foto.max' => 'Ukuran foto terlalu besar, maksimal 2MB',
      ]);
    
      if ($request->file('foto')) {
        $imgname = $request->nama.'.'.$request->foto->extension();
        $request->foto->move(public_path('asset/img/'), $imgname);
      } else {
        $imgname = 'default.png';
      }
    
      $user = new ProfileModel;
      $data = [
        'nama' => $request->nama,
        'kontak' => $request->kontak,
        'foto' => $imgname,
      ];
      $user->addData($data);
      return redirect('/profile')->with('status', 'Tambah data berhasil');
    }

    
}


