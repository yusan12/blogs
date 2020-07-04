<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'hoge',
                'body' =>'test'
            ],
            [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'hoge',
                'body' =>'test2'
            ],
            [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'hoge',
                'body' =>'test3'
            ]
        ]);
    }
}
