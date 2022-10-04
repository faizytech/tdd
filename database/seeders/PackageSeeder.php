<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $packages = [['name' => 'two days', 'no_of_days' => 2 ], ['name' => 'Week', 'no_of_days' => 7 ], ['name' => 'Monthly', 'no_of_days' => 30 ]];
        foreach($packages as $package){
            DB::table('packages')->insert([
                'name' => $package['name'],
                'no_of_days' => $package['no_of_days'],
            ]);
        }

    }
}
