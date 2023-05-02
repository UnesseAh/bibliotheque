<?php

namespace Database\Seeders;

use App\Models\Block;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $blocks = [
            ['name' => 'Non-fiction'],
            ['name' => 'Children'],
            ['name' => 'Science and Technology'],
            ['name' => 'History and Biography'],
            ['name' => 'Arts and Literature'],
            ['name' => 'Religion and Philosophy'],
            ['name' => 'Travel and Geography']
        ];

        foreach ($blocks as $block){
            Block::create($block);
        }
    }
}
