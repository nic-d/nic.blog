<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    /**
     * @return BelongsTo
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}