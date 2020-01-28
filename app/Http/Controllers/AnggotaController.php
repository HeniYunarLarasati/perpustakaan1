<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota_model;
use Illuminate\Support\Facades\Validator;
use Auth;
class AnggotaController extends Controller
{

  // CREATE
  public function store(Request $req)
  {
    if(Auth::user()->level=="admin"){
    $validator = Validator::make($req->all(),
    [
      'nama_anggota' => 'required',
      'alamat' => 'required',
      'telp' => 'required'
    ]
  );
    if($validator->fails()){
      return Response()->json($validator->errors());
    }
    $simpan = Anggota_model::create([
      'nama_anggota' => $req->nama_anggota,
      'alamat' => $req->alamat,
      'telp' => $req->telp

    ]);
      return Response()->json(['status'=> 'Data anggota berhasil dimasukkan']);
    } else {
      return Response()->json(['status'=> 'Data anggota gagal dimasukkan, anda bukan admin']);
    }
  }

  // READ
  public function tampil(){
    if(Auth::user()->level=="admin"){
  $datas = Anggota_model::get();
  $count = $datas->count();
  $anggota = array();
  $status = 1;
  foreach ($datas as $dt_sw){
    $anggota[] = array(
      'id' => $dt_sw->id,
      'nama_anggota' => $dt_sw->nama_anggota,
      'alamat' => $dt_sw->alamat,
      'telp' => $dt_sw->telp,
      'created_at' => $dt_sw->created_at,
      'updated_at' => $dt_sw->updated_at,
    );
  }
  return Response()->json(compact('count','anggota','status'));
} else {
  return Response()->json(['status'=> 'Gabisa lihat data anggota, kamu bukan admin :(']);
}
}

// UPDATE
public function update($id,Request $req)
{
  if(Auth::user()->level=="admin"){
  $validator=Validator::make($req->all(),
  [
    'nama_anggota' => 'required',
    'alamat' => 'required',
    'telp' => 'required',
  ]);
  if($validator->fails()){
    return Response()->json($validator->errors());
  }
  $ubah=Anggota_model::where('id',$id)->update([
    'nama_anggota' => $req->nama_anggota,
    'alamat' => $req->alamat,
    'telp' => $req->telp,
  ]);
    return Response()->json(['status'=>1,
                             'message'=>'Data anggota berhasil diubah']);
  } else {
    return Response()->json(['status'=>0,
                             'message'=>'Data anggota gagal diubah, kamu bukan admin :(']);
  }
}

// DELETE
public function delete($id)
{
  if(Auth::user()->level=="admin"){
  $hapus=Anggota_model::where('id',$id)->delete();
    return Response()->json([
                             'message'=>'Data anggota berhasil dihapus']);
  } else {
    return Response()->json([
                             'message'=>'Data anggota gagal dihapus, kamu bukan admin :(']);
  }

}
}
