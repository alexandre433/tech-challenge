<?php

namespace Tests\Feature;

use App\Models\Genre;
use Tests\TestCase;

class GenreTest extends TestCase
{
    /**
     * @group store.genre
     *
     */
    public function testUserCanAccessStoreGenreRoute()
    {
        $this->get(route('genres.store'))
            ->assertOk();
    }

    /**
     * @group store.genre
     *
     */
    public function testUserCanStoreGenre()
    {
        $genre_data = [
            'name' => 'romance',
        ];

        $this->post(route('genres.store', $genre_data))
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => array_keys($genre_data),
            ]);
    }

    /**
     * @group show.genre
     *
     */
    public function testUserCanViewGenreInformation()
    {
        $genre = Genre::all()->random(1)->first();
        $this->get(route('genres.show', $genre->id))
            ->assertOk()
            ->assertJson([
                'data' => $genre->toArray()
            ]);
    }

    /**
     * @group update.genre
     *
     */
    public function testUserCanUpdateGenreInformation()
    {
        $genre = Genre::all()->random(1)->first();

        $this->patch(
                route('genres.update', $genre->id),
                [
                    'name' => 'thriller',
                ]
            )
            ->assertOk()
            ->assertJson([
                'data' => $genre->fresh()->toArray()
            ]);
    }

    /**
     * @group delete.genre
     *
     */
    public function testUserDeleteGenre()
    {
        $genre = Genre::all()->random(1)->first();

        $this->delete(route('genres.destroy', $genre->id))
            ->assertStatus(204);

        $this->assertTrue(Genre::find($genre->id) === null);
    }

    /**
     * @group actors.genre
     *
     */
    public function testUserCanAccessActorsRoute()
    {
        $this->get(route('genres.actors'))
            ->assertOk();
    }
}
