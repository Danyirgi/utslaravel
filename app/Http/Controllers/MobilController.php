<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Mobil;
class MobilController extends Controller
{
    // public function book() {
    //     $data = "Data All Book";
    //     return response()->json($data, 200);
    // }

    // public function bookAuth() {
    //     $data = "Welcome " . Auth::user()->name;
    //     return response()->json($data, 200);
    // }
    public function index(){

        $mobil=Mobil::all();
        $data=['mobil'=>$mobil];
        return response ($data);
    }

    public function create(Request $request){
    try {
        $mobil=new Mobil();
        $mobil->nama_mobil=$request->nama_mobil;
        $mobil->merk=$request->merk;
        $mobil->bahan_bakar=$request->bahan_bakar;
        $mobil->plat_nomor=$request->plat_nomor;
        $mobil->warna=$request->warna;
        $mobil->jumlah=$request->jumlah;
        $mobil->save();

        return response()->json([
            'status' => '1',
            'message' => 'Tambah Mobil berhasil'
        ]);
    } catch(\Exception $e) {
        return response()->json([
            'status' => '0',
            'message' => 'Tambah Mobil gagal'
        ]);
        }
    }
    public function update(Request $request, $id){
    try{
        $mobil=Mobil::find($id);
        $mobil->nama_mobil=$request->nama_mobil;
        $mobil->merk=$request->merk;
        $mobil->bahan_bakar=$request->bahan_bakar;
        $mobil->plat_nomor=$request->plat_nomor;
        $mobil->warna=$request->warna;
        $mobil->jumlah=$request->jumlah;
        $mobil->save();

        return response()->json([
            'status' => '1',
            'message' => 'Ubah Mobil berhasil'
        ]);
    } catch(\Exception $e) {
        return response()->json([
            'status' => '0',
            'message' => 'Ubah Mobil gagal'
        ]);
    }
    }
    public function delete($id){
    try{
        $mobil=Mobil::find($id);
        $mobil->delete();

        return response()->json([
            'status' => '1',
            'message' => 'Hapus Mobil berhasil'
        ]);
    } catch(\Exception $e) {
        return response()->json([
            'status' => '0',
            'message' => 'Hapus Mobil gagal'
        ]);
    }
    }
    public function detail($id){
        $mobil=Mobil::find($id);

        return $mobil;
    }
}
