<?php

use App\Models\Actor;
use App\Models\MovieRoles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleHasActorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (MovieRoles::count() > 0 && Actor::count() > 0) {
            foreach (Actor::all() as $actor) {
                $roles = MovieRoles::all()->random(3);

                foreach ($roles as $role) {
                    DB::table('role_has_actors')
                        ->insert([
                            'role_id' => $role->id,
                            'actor_id' => $actor->id,
                        ]);
                }
            }
        }
    }
}
