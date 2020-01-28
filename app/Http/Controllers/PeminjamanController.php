<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjaman_model;
use Illuminate\Support\Facades\Validator;
use Auth;

class PeminjamanController extends Controller
{
  public function store(Request $req)
  {
    if(Auth::user()->level=="admin"){
    $validator = Validator::make($req->all(),
    [
      'tgl' => 'required',
      'id_anggota' => 'required',
      'id_petugas' => 'required',
      'tgl_deadline' => 'required',
      'denda' => 'required'
    ]);
    if($validator->fails()){
      return Response()->json($validator->errors());
    }
    $simpan = Peminjaman_model::create([
      'tgl' => $req->tgl,
      'id_anggota' => $req->id_anggota,
      'id_petugas' => $req->id_petugas,
      'tgl_deadline' => $req->tgl_deadline,
      'denda' => $req->denda,

    ]);
    return Response()->json(['status'=> 'Data peminjaman berhasil dimasukkan']);
  } else {
      return Response()->json(['status'=> 'Data peminjaman gagal dimasukkan, anda bukan admin']);
    }
  }


  public function tampil(){
    if(Auth::user()->level=="admin"){
  $datas = Peminjaman_model::get();
  $count = $datas->count();
  $anggota = array();
  $status = 1;
  foreach ($datas as $dt_sw){
    $anggota[] = array(
      'id' => $dt_sw->id,
      'tgl' => $dt_sw->tgl,
      'id_anggota' => $dt_sw->id_anggota,
      'id_petugas' => $dt_sw->id_petugas,
      'tgl_deadline' => $dt_sw->tgl_deadline,
      'denda' => $dt_sw->denda,
      'created_at' => $dt_sw->created_at,
      'updated_at' => $dt_sw->updated_at,
    );
  }
  return Response()->json(compact('count','anggota'));
} else {
  return Response()->json(['status'=> 'Gabisa, kamu bukan admin :(']);
}
}


public function update($id,Request $req)
{
  if(Auth::user()->level=="admin"){
  $validator=Validator::make($req->all(),
  [
    'tgl' => 'required',
    'id_anggota' => 'required',
    'id_petugas' => 'required',
    'tgl_deadline' => 'required',
    'denda' => 'required',
  ]);
  if($validator->fails()){
    return Response()->json($validator->errors());
  }
  $ubah=Peminjaman_model::where('id',$id)->update([
    'tgl' => $req->tgl,
    'id_anggota' => $req->id_anggota,
    'id_petugas' => $req->id_petugas,
    'tgl_deadline' => $req->tgl_deadline,
    'denda' => $req->denda,
  ]);
    return Response()->json(['status'=>1,
                             'message'=>'Data peminjaman berhasil diubah']);
  } else {
    return Response()->json(['status'=>0,
                             'message'=>'Data peminjaman gagal diubah, anda bukan admin']);
  }
}

public function delete($id)
{
  if(Auth::user()->level=="admin"){
  $hapus=Peminjaman_model::where('id',$id)->delete();
    return Response()->json([
                             'message'=>'Data peminjaman berhasil dihapus']);
  } else {
    return Response()->json([
                             'message'=>'Data peminjaman gagal dihapus, anda bukan admin']);
  }

}
}
