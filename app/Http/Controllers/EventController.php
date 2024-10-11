<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
class EventController extends Controller
{
    public function index(Request $request){
        return view('event.create');
    }

    public function store(StoreEventRequest $request){
        $validator=$request->validated();
        
        $event = Event::create($validator);

        return redirect()->route('create-event',$event)->with('success', 'Event created successfully');
    }
}
