<?php

use Illuminate\Database\Seeder;
use Illuminate\Filesystem\Filesystem;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $fileSystem = new Filesystem();
        $database = $fileSystem->get(base_path('database/seeds') . '/' . 'article.sql');
        $database = str_replace('{db_prefix}', env('DB_PREFIX'), $database);
        DB::connection()->getPdo()->exec($database);
    }
}