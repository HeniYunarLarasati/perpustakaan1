<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas_model extends Model
{
  protected $table="petugas";
  protected $primaryKey="id";
  public $timestamps=false;
}
