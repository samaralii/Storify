<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // DB::enableQueryLog();

        $query = Story::where('status', 1);
        $type = request()->input('type');

        if (in_array($type, ['short', 'long'])) {
            $query->where('type', $type);
        }

        $stories = $query->with('user')
            ->orderby('id', 'DESC')
            ->paginate(10);
        // dd($stories);
        return view('dashboard.index', [
            'stories' => $stories
        ]);
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $activeStory)
    {
        return view('dashboard.show', [
            'story' => $activeStory
        ]);
    }

}
