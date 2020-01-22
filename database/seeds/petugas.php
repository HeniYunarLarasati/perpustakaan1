<?php

use Illuminate\Database\Seeder;

class petugas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Petugas_model::insert([
            [
              'nama_petugas'  => 'heni',
              'alamat' => 'jalan sendirian aja',
              'telp'          => '0876425628562',
              'username'          => 'heniyunar',
              'password'          => 'momopapus',
              'created_at'      => \Carbon\Carbon::now('Asia/Jakarta'),
              'updated_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
              'nama_petugas'  => 'henii',
              'alamat' => 'jalan nin aja',
              'telp'          => '086543254431',
              'username'          => 'heni_yunar',
              'password'          => 'momopapus',
              'created_at'      => \Carbon\Carbon::now('Asia/Jakarta'),
              'updated_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
              'nama_petugas'  => 'heniii',
              'alamat' => 'jalan busuk',
              'telp'          => '087654556754',
              'username'          => 'heni__yunar',
              'password'          => 'momopapus',
              'created_at'      => \Carbon\Carbon::now('Asia/Jakarta'),
              'updated_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
              'nama_petugas'  => 'heniiii',
              'alamat' => 'jalan bibir',
              'telp'          => '083455443243',
              'username'          => 'heni___yunar',
              'password'          => 'momopapus',
              'created_at'      => \Carbon\Carbon::now('Asia/Jakarta'),
              'updated_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
              'nama_petugas'  => 'heniiiii',
              'alamat' => 'jalan bibir busuk',
              'telp'          => '089766554433',
              'username'          => 'heni_____yunar',
              'password'          => 'momopapus',
              'created_at'      => \Carbon\Carbon::now('Asia/Jakarta'),
              'updated_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}
