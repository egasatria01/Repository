<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    // Read Data Mahasiswa ----------------------------------------------------------------------------------------------
    public function index() {
        $mahasiswa = User::where('roles_id', 2 )->get();
        return view('mahasiswa', compact('mahasiswa'));
    }

    // Tambah Data Mahasiswa ----------------------------------------------------------------------------------------------
    public function tambah(Request $req){
        $mahasiswa = new User;

        $mahasiswa->name = $req->get('name');
        $mahasiswa->npm = $req->get('npm');
        $mahasiswa->email = $req->get('email');
        $mahasiswa->tgl_lahir = $req->get('tgl_lahir');
        $mahasiswa->alamat = $req->get('alamat');
        $mahasiswa->jurusan = $req->get('jurusan');
        $mahasiswa->angkatan = $req->get('angkatan');
        $mahasiswa->password = Hash::make($req->get('password'));
        $mahasiswa->prodi = $req->get('prodi');
        $mahasiswa->roles_id = 2 ;

        $mahasiswa->save();

        $notification = array(
            'message' =>'Data Mahasiswa berhasil ditambahkan', 'alert-type' =>'success'
        );
        return redirect()->route('mahasiswa')->with($notification);
    }

    // Get Data Mahasiswa ----------------------------------------------------------------------------------------------
    public function getDataMahasiswa($id){
        $mahasiswa = User::find($id);
        return response()->json($mahasiswa);
    }

    // Ubah Data Mahasiswa ----------------------------------------------------------------------------------------------
    public function ubah(Request $req) {
        $mahasiswa = User::find($req->get('id'));

        $mahasiswa->name = $req->get('name');
        $mahasiswa->npm = $req->get('npm');
        $mahasiswa->email = $req->get('email');
        $mahasiswa->tgl_lahir = $req->get('tgl_lahir');
        $mahasiswa->alamat = $req->get('alamat');
        $mahasiswa->jurusan = $req->get('jurusan');
        $mahasiswa->angkatan = $req->get('angkatan');
        $mahasiswa->prodi = $req->get('prodi');

        $mahasiswa->save();

        $notification = array(
            'message' => 'Data Mahasiswa berhasil diubah',
            'alert-type' => 'success'
        );
        return redirect()->route('mahasiswa')->with($notification);
    }

    // Hapus Data Mahasiswa ----------------------------------------------------------------------------------------------
    public function hapus($id){
        $mahasiswa = User::find($id);

        $mahasiswa->delete();

        $success = true;
        $message = "Data Mahasiswa berhasil dihapus";

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
