<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Imports\MahasiswaImport;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

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

    // Import Mahasiswa --------------------------------------------------------------------------------------------------
    public function import(Request $req){
        Excel::import(new MahasiswaImport, $req->file('file'));

        $notification = array (
            'message' => 'Import data berhasil dilakukan',
            'alert-type' => 'success'
        );

        return redirect()->route('mahasiswa')->with($notification);
    }
}
