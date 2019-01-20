<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * Class Article
 * @package App
 */
class Article extends Model
{
    use Sluggable;

    /**
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }
}