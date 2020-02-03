<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_model extends Model
{
  protected $table="detail_peminjaman";
  protected $primaryKey="id";
  protected $fillable = [
    'id_pinjam', 'id_buku', 'qty'
  ];
}
