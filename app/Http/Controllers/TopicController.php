<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Topic;

class TopicController extends Controller
{
    public function index()
	{
    $topics = Topic::all();
    $topic_names = $topics->pluck('name');
    return view('topic.index', array('topics' => $topics, 'topic_names' => $topic_names));
	}
}
