<?php

namespace Tests\Feature;

use App\Models\Actor;
use Tests\TestCase;

class ActorTest extends TestCase
{
    /**
     * @group store.actor
     *
     */
    public function testUserCanAccessStoreActorRoute()
    {
        $this->get(route('actors.store'))
            ->assertOk();
    }

    /**
     * @group store.actor
     *
     */
    public function testUserCanStoreActor()
    {
        $actor_data = [
            'name' => 'Joao Bananas',
            'bios' => 'Nasceu ao pé de uma bananeira, dai o nome, Joao Bananas',
            'born_at' => '23-11-1989',
        ];

        $this->post(route('actors.store', $actor_data))
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => array_keys($actor_data),
            ]);
    }

    /**
     * @group show.actor
     *
     */
    public function testUserCanViewActorInformation()
    {
        $actor = Actor::all()->random(1)->first();
        $this->get(route('actors.show', $actor->id))
            ->assertOk()
            ->assertJson([
                'data' => $actor->toArray(),
            ]);
    }

    /**
     * @group update.actor
     *
     */
    public function testUserCanUpdateActorInformation()
    {
        $actor = Actor::all()->random(1)->first();

        $this->patch(
            route('actors.update', $actor->id),
            [
                'name' => 'thriller',
            ]
        )
            ->assertOk()
            ->assertJson([
                'data' => $actor->fresh()->toArray(),
            ]);
    }

    /**
     * @group delete.actor
     *
     */
    public function testUserDeleteActor()
    {
        $actor = Actor::all()->random(1)->first();

        $this->delete(route('actors.destroy', $actor->id))
            ->assertStatus(204);

        $this->assertTrue(Actor::find($actor->id) === null);
    }

    /**
     * @group appearances.actor
     *
     */
    public function testUserCanAccessActorsRoute()
    {
        $this->get(route('actors.appearances'))
            ->assertOk();
    }
}
