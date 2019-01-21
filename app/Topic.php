<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Topic
 * @package App
 */
class Topic extends Model
{
    use Sluggable;

    /** @var array $fillable */
    protected $fillable = ['name'];

    /**
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    /**
     * @return HasMany
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}