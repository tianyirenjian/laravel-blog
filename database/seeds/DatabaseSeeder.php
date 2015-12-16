<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory('App\User')->create();
        factory('App\Setting')->create();
        factory('App\Profile')->create();
        

        $this->call(SettingTableSeeder::class);

        Model::reguard();
    }
}
