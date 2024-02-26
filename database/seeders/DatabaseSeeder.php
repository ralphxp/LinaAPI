<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $interests = [
            "photography",
            "cooking",
            "video games",
            "hiking",
            "shopping",
            "travelling",
            "speeches",
            "swimming",
            "tourism",
            "Arts and crafts",
            "sports",
            "wrestling",
            "fitness",
            "reading",
            "dancing",
            "extreme sports",
            "movies",
            "hunting",
            "technology",
            "AI and robotics",
            "trekking",
            "groceries",
            "baking",
        ];

        foreach($interests as $interest){
            \App\Models\Interest::create([
                    'name' => $interest,
                ]);
        }
    }
}
