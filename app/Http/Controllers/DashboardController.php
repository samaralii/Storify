<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewStoryNotification;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
        // DB::enableQueryLog();
        $query = Story::where('status', 1);

        $type = request()->input('type');
        if (in_array($type, ['short', 'long'])) {
            $query->where('type', $type);
        }


        $stories = $query->with(['user', 'tags'])
            ->orderBy('id', 'DESC')
            ->paginate(9);
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

    public function email()
    {

        // Mail::send(new NotifyAdmin('Title of the story'));
        Mail::send(new NewStoryNotification('Title of the story'));

        // Mail::raw('This is the test email', function ($message) {
        //     $message->to('admin@localhost.com', 'John Doe');
        //     $message->subject('Subject');
        //     // $message->from('john@johndoe.com', 'John Doe');
        //     // $message->sender('john@johndoe.com', 'John Doe');
        //     // $message->cc('john@johndoe.com', 'John Doe');
        //     // $message->bcc('john@johndoe.com', 'John Doe');
        //     // $message->replyTo('john@johndoe.com', 'John Doe');
        //     // $message->priority(3);
        //     // $message->attach('pathToFile');
        // });

        dd('here');
    }
}
