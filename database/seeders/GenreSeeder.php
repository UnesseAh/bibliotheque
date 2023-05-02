<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            'Action and Adventure',
            'Anthology',
            'Classic',
            'Comic and Graphic Novel',
            'Crime and Detective',
            'Drama',
            'Fable',
            'Fairy Tale',
            'Fan-Fiction',
            'Fantasy',
            'Historical Fiction',
            'Horror',
            'Humor',
            'Legend',
            'Magical Realism',
            'Mystery',
            'Mythology',
            'Realistic Fiction',
            'Romance',
            'Satire',
            'Science Fiction',
            'Short Story',
            'Suspense/Thriller',
            'Tall Tale',
            'Terror',
            'Tragedy',
            'Western',
            'Young Adult',
            'Biography',
            'Essay',
            'Memoir',
            'Narrative Nonfiction'
        ];

        foreach ($genres as $genre) {
            Genre::create([
                'name' => $genre
            ]);
        }
    }
}
