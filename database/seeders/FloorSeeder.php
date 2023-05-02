<?php

namespace Database\Seeders;

use App\Models\Floor;
use App\Models\Shelve;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shelves = [
            // Non-fiction Block
            ['block_id' => 1, 'name' => 'Business and Finance'],
            ['block_id' => 1, 'name' => 'Self-help'],
            ['block_id' => 1, 'name' => 'Health and Wellness'],
            ['block_id' => 1, 'name' => 'Politics and Current Affairs'],
            ['block_id' => 1,  'name' => 'Science and Nature'],
            ['block_id' => 1, 'name' => 'Social Sciences'],
            ['block_id' => 1, 'name' => 'Technology and Computing'],
            ['block_id' => 1, 'name' => 'True Crime'],

            // Children block
            ['block_id' => 2, 'name' => 'Board Books'],
            ['block_id' => 2, 'name' => 'Picture Books'],
            ['block_id' => 2, 'name' => 'Early Readers'],
            ['block_id' => 2, 'name' => 'Chapter Books'],
            ['block_id' => 2, 'name' => 'Graphic Novels'],
            ['block_id' => 2, 'name' => 'Non-fiction'],
            ['block_id' => 2, 'name' => 'Poetry and Rhymes'],
            ['block_id' => 2, 'name' => 'Classics'],

            // Science and Technology block
            ['block_id' => 3, 'name' => 'Biology'],
            ['block_id' => 3, 'name' => 'Chemistry'],
            ['block_id' => 3, 'name' => 'Physics'],
            ['block_id' => 3, 'name' => 'Astronomy'],
            ['block_id' => 3, 'name' => 'Earth Sciences'],
            ['block_id' => 3, 'name' => 'Environment and Ecology'],
            ['block_id' => 3, 'name' => 'Computers and Internet'],
            ['block_id' => 3, 'name' => 'Engineering'],

            // History and Biography block
            ['block_id' => 4, 'name' => 'Ancient History'],
            ['block_id' => 4, 'name' => 'World History'],
            ['block_id' => 4, 'name' => 'American History'],
            ['block_id' => 4, 'name' => 'European History'],
            ['block_id' => 4, 'name' => 'Military History'],
            ['block_id' => 4, 'name' => 'Biographies and Memoirs'],
            ['block_id' => 4, 'name' => 'Autobiographies'],
            ['block_id' => 4, 'name' => 'Political Figures'],

            // Arts and Literature block
            ['block_id' => 5, 'name' => 'Fiction'],
            ['block_id' => 5, 'name' => 'Poetry'],
            ['block_id' => 5, 'name' => 'Drama'],
            ['block_id' => 5, 'name' => 'Literary Criticism'],
            ['block_id' => 5, 'name' => 'Art History'],
            ['block_id' => 5, 'name' => 'Photography'],
            ['block_id' => 5, 'name' => 'Music'],
            ['block_id' => 5, 'name' => 'Film and Cinema'],
            ['block_id' => 5, 'name' => 'Theater and Performing Arts'],

            // Religion and Philosophy block
            ['block_id' => 6, 'name' => 'Christianity'],
            ['block_id' => 6, 'name' => 'Islam'],
            ['block_id' => 6, 'name' => 'Judaism'],
            ['block_id' => 6, 'name' => 'Buddhism'],
            ['block_id' => 6, 'name' => 'Hinduism'],
            ['block_id' => 6, 'name' => 'Philosophy'],
            ['block_id' => 6, 'name' => 'Ethics and Morality'],
            ['block_id' => 6, 'name' => 'Mythology and Folklore'],

            // Travel and Geography block
            ['block_id' => 7, 'name' => 'North America'],
            ['block_id' => 7, 'name' => 'South America'],
            ['block_id' => 7, 'name' => 'Europe'],
            ['block_id' => 7, 'name' => 'Asia'],
            ['block_id' => 7, 'name' => 'Africa'],
            ['block_id' => 7, 'name' => 'Australia and Oceania'],
            ['block_id' => 7, 'name' => 'Travel Guides'],

        ];

        
    }
}
