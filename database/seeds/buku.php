<?php

use Illuminate\Database\Seeder;

class buku extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Buku_model::insert([
            [
              'judul'  => 'Mentari Terbenam di Ketekmu',
              'penerbit' => 'Asal asalan production',
              'pengarang'          => 'Heni Cantik',
              'foto'          => '-',
              'created_at'      => \Carbon\Carbon::now('Asia/Jakarta'),
              'updated_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
              'judul'  => 'Ada Kutu di Rambutmu',
              'penerbit' => 'Saya Sendiri',
              'pengarang'          => 'Bukan Aku',
              'foto'          => '-',
              'created_at'      => \Carbon\Carbon::now('Asia/Jakarta'),
              'updated_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
              'judul'  => 'Kamu Cantik di Hidungku',
              'penerbit' => 'Asal asalan production',
              'pengarang'          => 'Saya',
              'foto'          => '-',
              'created_at'      => \Carbon\Carbon::now('Asia/Jakarta'),
              'updated_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
              'judul'  => 'Buntut Peri',
              'penerbit' => 'Kondansha',
              'pengarang'          => 'Hiro Mashima',
              'foto'          => '-',
              'created_at'      => \Carbon\Carbon::now('Asia/Jakarta'),
              'updated_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
              'judul'  => 'Buntut Peri 2',
              'penerbit' => 'Kondansha',
              'pengarang'          => 'Hiro Mashima',
              'foto'          => '-',
              'created_at'      => \Carbon\Carbon::now('Asia/Jakarta'),
              'updated_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}
