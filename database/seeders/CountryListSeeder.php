<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountryListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $created_at = new \DateTime();
        $updated_at = new \DateTime();
        DB::table('service_countries')->insert([
          ['name' => 'Meksika', 'country_code' => 'mx', 'currency' => 'Pesos' , 'currency_code' => 'ps', 'status' => 'active' , 'created_at' => $created_at, 'updated_at' => $updated_at ],
          ['name' => 'Singapur', 'country_code' => 'sg', 'currency' => 'Singapore Dollars', 'currency_code' => 'sgd', 'status' =>'active', 'created_at' => $created_at, 'updated_at' => $updated_at ],
          ['name' => 'Avustralya' , 'country_code' => 'au' ,'currency' => 'Australian Dollar', 'currency_code' => 'aud' ,'status' =>'active', 'created_at' => $created_at, 'updated_at' => $updated_at ],
          ['name' => 'Birleşik Arap Emirlikleri' , 'country_code' => 'ae', 'currency' => 'Dirham', 'currency_code' => 'aed' ,'status' =>'active', 'created_at' => $created_at, 'updated_at' => $updated_at ],
          ['name' => 'Japonya' , 'country_code' => 'jp','currency' => 'Yen', 'currency_code' => 'jpy' ,'status' =>'active', 'created_at' => $created_at, 'updated_at' => $updated_at ],
          ['name' => 'İngiltere' , 'country_code' => 'gb' ,'currency' => 'Pound', 'currency_code' => 'gbp' , 'status' =>'active', 'created_at' => $created_at, 'updated_at' => $updated_at ]
      ]);
    }
}
