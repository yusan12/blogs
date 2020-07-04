<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['category_name' => 'もくもく'],
            ['category_name' => 'もくもく&雑談'],
            ['category_name' => '雑談']
        ]);
    }
}
