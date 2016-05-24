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
    $topic_list = Topic::lists('name', 'id');
    return view('topic.index', array('topics' => $topics, 'topic_list' => $topic_list));
	}
}
