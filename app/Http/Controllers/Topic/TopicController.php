<?php

namespace App\Http\Controllers\Topic;

use App\Topic;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use App\Http\Repository\TopicRepository;

/**
 * Class TopicController
 * @package App\Http\Controllers\Topic
 */
class TopicController extends Controller
{
    /** @var TopicRepository $topicRepository */
    private $topicRepository;

    /**
     * TopicController constructor.
     * @param TopicRepository $topicRepository
     */
    public function __construct(TopicRepository $topicRepository)
    {
        $this->topicRepository = $topicRepository;
    }

    /**
     * @param Topic $topic
     * @return Factory|View
     */
    public function show(Topic $topic)
    {
        dd($topic->articles());

        return view('topic.show', compact('topic'));
    }
}