<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Topic;

class TopicController extends Controller
{
    public function index() {
      $topics = Topic::all();
      return view('topic.index', array('topics' => $topics));
    }
}
