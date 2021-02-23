<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;

class StoriesController extends Controller
{
    public function index() {

        $stories = Story::where('user_id', auth()->user()->id)
            ->orderby('id', 'DESC')
            ->paginate(3);  
        // dd($stories);
        return view('stories.index', [
            'stories' => $stories
        ]);
    }
}
