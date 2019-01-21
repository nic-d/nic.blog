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

    /** @var array $fillable */
    protected $fillable = ['title', 'markdown'];

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