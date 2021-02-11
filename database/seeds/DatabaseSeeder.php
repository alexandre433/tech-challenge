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
        $this->call(GenreSeeder::class);
        $this->call(MovieSeeder::class);
        $this->call(ActorSeeder::class);
        $this->call(MovieRolesSeeder::class);
        $this->call(MovieHasGenresSeeder::class);
        $this->call(MovieHasRolesSeeder::class);
        $this->call(RoleHasActorsSeeder::class);
    }
}
