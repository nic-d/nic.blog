<?php

use App\Topic;
use Illuminate\Database\Seeder;

/**
 * Class TopicSeeder
 */
class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        factory(Topic::class, 3)->create()->each(function ($topic) {
            $topic->save();
        });
    }
}