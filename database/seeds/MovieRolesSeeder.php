<?php

use App\Models\MovieRoles;
use Illuminate\Database\Seeder;

class MovieRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (MovieRoles::count() < 50) {
            factory(MovieRoles::class, 50)
                ->create();
        }
    }
}
