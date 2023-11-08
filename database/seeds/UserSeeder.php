<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'nama' => Str::random(10),
                'jeniskelamin' => 'Laki-Laki',
                'tanggallahir' => Carbon::create('2000', '01', '01'),
                'username' => 'admin',
                'password' => Hash::make('NUSWANTARA'),
                'role' => 'superadmin',
                'status' => 'aktif',
                'sekolahid' => 1,
            ],
        ]);
    }
}
