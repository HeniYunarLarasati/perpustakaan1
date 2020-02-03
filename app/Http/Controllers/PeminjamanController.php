<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjaman_model;
use App\Detail_model;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;

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

  //Detail Peminjaman_model

  public function storedetail(Request $req)
  {
    if(Auth::user()->level=="admin"){
    $validator = Validator::make($req->all(),
    [
      'id_pinjam' => 'required',
      'id_buku' => 'required',
      'qty' => 'required'
    ]);
    if($validator->fails()){
      return Response()->json($validator->errors());
    }
    $simpan = Detail_model::create([
      'id_pinjam' => $req->id_pinjam,
      'id_buku' => $req->id_buku,
      'qty' => $req->qty

    ]);
    return Response()->json(['status'=> 'Data detail berhasil dimasukkan']);
  } else {
      return Response()->json(['status'=> 'Data detail gagal dimasukkan, anda bukan admin']);
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

  public function tampildetail(){
    if(Auth::user()->level=="admin"){
      $peminjaman=DB::table('peminjaman')
      ->join('anggota','anggota.id','=','peminjaman.id_anggota')
      ->join('petugas','petugas.id','=','peminjaman.id_petugas')
      ->select('peminjaman.id','peminjaman.id_anggota','anggota.nama_anggota','peminjaman.id_petugas','peminjaman.tgl','peminjaman.tgl_deadline','peminjaman.denda')
      ->get();

      $data=array();
      foreach ($peminjaman as $peminjaman){
        $detail=Detail_model::where('id_pinjam',$peminjaman->id)->get();
        $arr_detail=array();
        foreach($detail as $detail){
          $arr_detail[]=array(
            'id_peminjaman' => $detail->id_pinjam,
            'id_buku' => $detail->id_buku,
            'qty' => $detail->qty
          );
        }

        $data[]=array(
          'id' => $peminjaman->id,
          'id_anggota' => $peminjaman->id_anggota,
          'nama_anggota' => $peminjaman->nama_anggota,
          'id_petugas' => $peminjaman->id_petugas,
          'tgl_pinjam' => $peminjaman->tgl,
          'tgl_deadline' => $peminjaman->tgl_deadline,
          'denda' => $peminjaman->denda,
          'detail_pinjam' => $arr_detail,
        );
      }
      return Response()->json(compact('data'));
    } else {
      return Response()->json(['status'=>'anda bukan admin']);
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


public function updatedetail($id,Request $req)
{
  if(Auth::user()->level=="admin"){
  $validator=Validator::make($req->all(),
  [
    'id_pinjam' => 'required',
    'id_buku' => 'required',
    'qty' => 'required'
  ]);
  if($validator->fails()){
    return Response()->json($validator->errors());
  }
  $ubah=Detail_model::where('id',$id)->update([
    'id_pinjam' => $req->id_pinjam,
    'id_buku' => $req->id_buku,
    'qty' => $req->qty,
  ]);
    return Response()->json(['status'=>1,
                             'message'=>'Data detail berhasil diubah']);
  } else {
    return Response()->json(['status'=>0,
                             'message'=>'Data detail gagal diubah, anda bukan admin']);
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

public function deletedetail($id)
{
  if(Auth::user()->level=="admin"){
  $hapus=Detail_model::where('id',$id)->delete();
    return Response()->json([
                             'message'=>'Data detail berhasil dihapus']);
  } else {
    return Response()->json([
                             'message'=>'Data detail gagal dihapus, anda bukan admin']);
  }

}
}
