<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 21/01/2019
 * Time: 16:19
 */

namespace App\Http\Repository;

use App\Article;

/**
 * Class ArticleRepository
 * @package App\Http\Repository
 */
class ArticleRepository extends AbstractRepository
{
    /**
     * ArticleRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(Article::class);
    }
}