<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman_model extends Model
{
  protected $table="peminjaman";
  protected $primaryKey="id";
  protected $fillable = [
    'tgl', 'id_anggota', 'id_petugas', 'tgl_deadline', 'denda',
  ];
}
