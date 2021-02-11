<?php

use App\Models\Movie;
use App\Models\MovieRoles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieHasRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (MovieRoles::count() > 0 && Movie::count() > 0) {
            foreach (Movie::all() as $movie) {
                $number_of_roles = rand(3, 15);

                $roles = MovieRoles::select('id')
                    ->get()->random($number_of_roles);

                foreach ($roles as $role) {
                    DB::table('movie_has_roles')
                        ->insert([
                            'movie_id' => $movie->id,
                            'role_id' => $role->id,
                        ]);
                }
            }
        }
    }
}
