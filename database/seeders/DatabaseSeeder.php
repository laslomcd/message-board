<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\User;
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

        User::factory(5)->create()->each(function($u){
               $u->questions()
                   ->saveMany(Question::factory(rand(1,5)))->create([
                       'user_id' => User::find(rand(1,5))->id
                   ]);
        });

//         User::factory()->count(3)
//             ->has(Question::factory()->count(rand(1,10)))
//             ->create();

    }
}
