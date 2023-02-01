<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::create([
            "name" => ["en"=>'EGP','ar'=>'جنيه'] ,
            "rate" =>10 ,
            "from" =>now() ,
            "to" => now()
        ]);
    }
}
