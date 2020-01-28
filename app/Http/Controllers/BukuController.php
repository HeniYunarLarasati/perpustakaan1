<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku_model;
use Illuminate\Support\Facades\Validator;
use Auth;

class BukuController extends Controller
{
  // CREATE
  public function store(Request $req)
  {
    if(Auth::user()->level=="admin"){
    $validator = Validator::make($req->all(),
    [
      'judul' => 'required',
      'penerbit' => 'required',
      'pengarang' => 'required',
      'foto' => 'required'
    ]);
    if($validator->fails()){
      return Response()->json($validator->errors());
    }
    $simpan = Buku_model::create([
      'judul' => $req->judul,
      'penerbit' => $req->penerbit,
      'pengarang' => $req->pengarang,
      'foto' => $req->foto,

    ]);
    return Response()->json(['status'=> 'Data buku berhasil dimasukkan']);
  } else {
      return Response()->json(['status'=> 'Data buku gagal dimasukkan, anda bukan admin']);
    }
  }

  //READ
  public function tampil(){
    if(Auth::user()->level=="admin"){
  $datas = Buku_model::get();
  $count = $datas->count();
  $buku = array();
  $status = 1;
  foreach ($datas as $dt_sw){
    $buku[] = array(
      'id' => $dt_sw->id,
      'judul' => $dt_sw->judul,
      'penerbit' => $dt_sw->penerbit,
      'pengarang' => $dt_sw->pengarang,
      'foto' => $dt_sw->foto,
      'created_at' => $dt_sw->created_at,
      'updated_at' => $dt_sw->updated_at,
    );
  }
  return Response()->json(compact('count','buku'));
} else {
  return Response()->json(['status'=> 'Gabisa, kamu bukan admin :(']);
}
}

// UPDATE
public function update($id,Request $req)
{
  if(Auth::user()->level=="admin"){
  $validator=Validator::make($req->all(),
  [
    'judul' => 'required',
    'penerbit' => 'required',
    'pengarang' => 'required',
    'foto' => 'required',
  ]);
  if($validator->fails()){
    return Response()->json($validator->errors());
  }
  $ubah=Buku_model::where('id',$id)->update([
    'judul' => $req->judul,
    'penerbit' => $req->penerbit,
    'pengarang' => $req->pengarang,
    'foto' => $req->foto,
  ]);
    return Response()->json(['status'=>1,
                             'message'=>'Data buku berhasil diubah']);
  } else {
    return Response()->json(['status'=>0,
                             'message'=>'Data buku gagal diubah, anda bukan admin']);
  }
}

//DELETE
public function delete($id)
{
  if(Auth::user()->level=="admin"){
  $hapus=Buku_model::where('id',$id)->delete();
    return Response()->json([
                             'message'=>'Data buku berhasil dihapus']);
  } else {
    return Response()->json([
                             'message'=>'Data buku gagal dihapus, anda bukan admin']);
  }

}
}
