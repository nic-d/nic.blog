<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 21/01/2019
 * Time: 19:53
 */

namespace App\Http\Repository;

use App\Topic;

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
}