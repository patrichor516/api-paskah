<?php

namespace Database\Seeders;

use App\Models\barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class barangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i=0 ; $i < 10  ; $i++ ){
            barang::create([
                'nama_barang'=> $faker->word(),
                'jenis_barang'=> $faker->countryCode(),
                'stok_barang'=> $faker->randomDigit(),
                ]);
             }
    }
}
