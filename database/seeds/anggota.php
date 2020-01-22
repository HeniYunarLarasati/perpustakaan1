<?php

use Illuminate\Database\Seeder;

class anggota extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Anggota_model::insert([
            [
              'nama_anggota'  => 'heni yunar',
              'alamat' => 'jalan sendirian aja',
              'telp'          => '081234567890',
              'created_at'      => \Carbon\Carbon::now('Asia/Jakarta'),
              'updated_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
              'nama_anggota'  => 'larasati',
              'alamat' => 'jalan in aja',
              'telp'          => '08123777777',
              'created_at'      => \Carbon\Carbon::now('Asia/Jakarta'),
              'updated_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
              'nama_anggota'  => 'heni larasati',
              'alamat' => 'jalan bibir busuk',
              'telp'          => '0876542890',
              'created_at'      => \Carbon\Carbon::now('Asia/Jakarta'),
              'updated_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
              'nama_anggota'  => 'budi badudi',
              'alamat' => 'jalan bibir busuk',
              'telp'          => '0876542890',
              'created_at'      => \Carbon\Carbon::now('Asia/Jakarta'),
              'updated_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
              'nama_anggota'  => 'henicantik',
              'alamat' => 'jalan bibir busuk',
              'telp'          => '0876542890',
              'created_at'      => \Carbon\Carbon::now('Asia/Jakarta'),
              'updated_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}
