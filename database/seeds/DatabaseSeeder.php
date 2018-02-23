<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
=======
        $this->call(AdminSeeder::class);
>>>>>>> 4b8238cefb389caf26b3804aa494d440c00c43e7
        $this->call(PostSeeder::class);
    }
}
