<?php

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieHasGenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Movie::count() > 0 && Genre::count() > 0) {
            foreach (Movie::all() as $movie) {
                $genres = Genre::select('id')
                    ->get()
                    ->random(1);
                foreach ($genres as $genre) {
                    DB::table('movie_has_genres')
                        ->insert([
                            'movie_id' => $movie->id,
                            'genre_id' => $genre->id,
                        ]);
                }
            }
        }
    }
}
