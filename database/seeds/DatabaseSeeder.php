<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\Categoria::class, 2)->create();

        //Se crearan 40 post
        factory(App\Curso::class, 40)->create();
    }
}
