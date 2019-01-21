<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Repository\TopicRepository;

/**
 * Class TopicMiddleware
 * @package App\Http\Middleware
 */
class TopicMiddleware
{
    /** @var TopicRepository $topicRepository */
    private $topicRepository;

    /**
     * TopicMiddleware constructor.
     * @param TopicRepository $topicRepository
     */
    public function __construct(TopicRepository $topicRepository)
    {
        $this->topicRepository = $topicRepository;
    }
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $topics = $this->topicRepository->findAll();
        // TODO: Inject topics into the view...
        dd('hello world');

        return $next($request);
    }
}