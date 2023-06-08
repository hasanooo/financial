<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GeneralSetting extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('general_settings')->insert([
            //Admin Details
            [
                'company_name' => 'Bengal Software',
                'contact_name' => 'abedin',
                'email' => 'abedin@gmail.com',
            ],  

        ]);
    }
}
