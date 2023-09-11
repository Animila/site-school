<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    //получить все мероприятия
    public function getAllEvents()
    {
        $event_list = Events::all()->all();
        return view('events/index', compact('event_list'));
    }

    //получить одно мероприятие
    public function getOneEvent($id)
    {
        $event = Events::find($id);
        return view('content/event', compact('event'));
    }

    //создать мероприятие
    public function createEvent(Request $request)
    {
        try {
            $param = $request->request->all();
            Events::create($param);
        } catch (\Exception $e) {
            dd(["success"=>false, "message"=>$e]);
        }

        return redirect()->route('events.index');
    }

    //удалить мероприятие
    public function deleteEvent($id)
    {
        $delete_event = Events::find($id);
        $delete_event->delete();
        return redirect()->back();
    }

    //изменить мероприятие
    public function editEvent(Request $request)
    {
        try {
            $param = $request->request->all();
            $put_event = Events::find($request['id']);

            $put_event['datetime'] = $param['datetime'];
            $put_event['title'] = $param['title'];
            $put_event['description'] = $param['description'];

            $put_event->save();
            $result = ["success"=> true, "message"=>$put_event];
        } catch (\Exception $e) {
            $result = ["success"=>false, "message"=>$e];
        }

        return redirect()->route('events.index');
    }

    public function getCalendar() {
        $event_list = Events::all()->all();
        return view('events/calendary', compact('event_list'));
    }

    public function nextEvent() {
        $currentDateTime = now();
        $event_list = Events::where('datetime', '>', $currentDateTime)->get();

        return view('events/index', compact('event_list'));

    }

    public function backEvent() {
        $currentDateTime = now();
        $event_list = Events::where('datetime', '<', $currentDateTime)->get();

        return view('events/index', compact('event_list'));

    }
}
