<?php

namespace Tests\Feature;

use App\Models\Movie;
use Tests\TestCase;

class MovieTest extends TestCase
{
    /**
     * @group store.movie
     *
     */
    public function testUserCanAccessStoreMovieRoute()
    {
        $this->get(route('movies.store'))
            ->assertOk();
    }

    /**
     * @group store.movie
     *
     */
    public function testUserCanStoreMovie()
    {
        $movie_data = [
            'name'        => 'Harry Potter',
            'year'        => '1997',
            'synopsis'    => "Harry Potter and the Philosopher\'s Stone/Film synopsis Adaptation of the first of J.K. Rowling's popular children's novels about Harry Potter",
            'runtime'     => '159',
            'released_at' => '03/03/2001',
            'cost'        => '125000000',
        ];

        $this->post(route('movies.store', $movie_data))
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => array_keys($movie_data),
            ]);
    }

    /**
     * @group show.movie
     *
     */
    public function testUserCanViewMovieInformation()
    {
        $movie = Movie::all()->random(1)->first();
        $this->get(route('movies.show', $movie->id))
            ->assertOk()
            ->assertJson([
                'data' => $movie->toArray()
            ]);
    }

    /**
     * @group update.movie
     *
     */
    public function testUserCanUpdateMovieInformation()
    {
        $movie = Movie::all()->random(1)->first();

        $this->patch(
                route('movies.update', $movie->id),
                [
                    'name' => 'Ali ao lado',
                ]
            )
            ->assertOk()
            ->assertJson([
                'data' => $movie->fresh()->toArray()
            ]);
    }

    /**
     * @group delete.movie
     *
     */
    public function testUserDeleteMovie()
    {
        $movie = Movie::all()->random(1)->first();

        $this->delete(route('movies.destroy', $movie->id))
            ->assertStatus(204);

        $this->assertTrue(Movie::find($movie->id) === null);
    }
}
