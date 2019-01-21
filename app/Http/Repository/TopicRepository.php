<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 21/01/2019
 * Time: 19:53
 */

namespace App\Http\Repository;

use App\Topic;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class TopicRepository
 * @package App\Http\Repository
 */
class TopicRepository extends AbstractRepository
{
    /**
     * TopicRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(Topic::class);
    }

    /**
     * @param Topic $topic
     * @return LengthAwarePaginator
     */
    public function getArticlesForTopic(Topic $topic)
    {
        return DB::table('topics')
            ->join('articles', 'articles.topic_id', '=', 'topics.id')
            ->select('articles.*')
            ->where('topics.id', '=', $topic->id)
            ->paginate();
    }
}