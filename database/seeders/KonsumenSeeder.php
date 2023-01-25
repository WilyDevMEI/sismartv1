<?php

namespace Database\Seeders;

use App\Models\Konsumen;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KonsumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Konsumen::factory(10000)->create();

        Konsumen::create(['name_company' => 'PT Dumai Tirta Persada', 'owner' => 'Danar', 'email' => "danar@mitoindonesia.com", 'phone' => '085725220507', 'address' => 'Jakarta', 'city' => 'Jakarta', 'country' => 'Indonesia', 'description_company' => 'testing', 'type_customer' => 'Water Treatment Industry', 'deed_number' => '10001.10002', 'pkp' => 'PKP', 'npwp' => '1002.202.201001']);
        Konsumen::create(['name_company' => 'PT Flora Wahana Tirta', 'owner' => 'Ari', 'email' => "ari@mitoindonesia.com", 'phone' => '081294531750', 'address' => 'Kampar', 'city' => 'Pekanbaru', 'country' => 'Indonesia', 'description_company' => 'testing', 'type_customer' => 'Water Treatment Industry', 'deed_number' => '10001.10003', 'pkp' => 'NON-PKP', 'npwp' => '1002.202.201022']);
        Konsumen::create(['name_company' => 'UPTD Siak', 'owner' => 'Basir', 'email' => "basir@mitoindonesia.com", 'phone' => '082350921731', 'address' => 'SPAM Bunga Raya', 'city' => 'Pekanbaru', 'country' => 'Indonesia', 'description_company' => 'testing', 'type_customer' => 'Waater Distribution', 'deed_number' => '10001.10004', 'pkp' => 'PKP', 'npwp' => '1002.202.201192']);
        Konsumen::create(['name_company' => 'PT Agro Abadi cemerlang', 'owner' => 'Tn. Dian', 'email' => "dian@mitoindonesia.com", 'phone' => '082154339277', 'address' => 'Jl. Soekarno Hatta', 'city' => 'Pontianak', 'country' => 'Indonesia', 'description_company' => 'testing', 'type_customer' => 'Boiler Industry', 'deed_number' => '10001.10006', 'pkp' => 'Kompensasi', 'npwp' => '1002.202.201107']);
    }
}
