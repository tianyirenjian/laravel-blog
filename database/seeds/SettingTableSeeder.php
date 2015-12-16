<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'name'=>'webname',
                'value'=>'Goenitz'
            ],
            [
                'name'=>'keywords',
                'value'=>'Goenitz,Php,laravel'
            ],
            [
                'name'=>'description',
                'value'=>'Goenitz 个人空间'
            ]
        ]);
    }
}
