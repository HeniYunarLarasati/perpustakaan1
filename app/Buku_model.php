<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku_model extends Model
{
  protected $table="buku";
  protected $primaryKey="id";
  public $timestamps=false;
}
