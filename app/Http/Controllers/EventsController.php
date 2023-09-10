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
    public function postEvent(Request $request)
    {
        try {
            $param = $request->request->all();
            $new_event = Events::create($param);
            $result = ["success"=> true, "message"=>$new_event];
        } catch (\Exception $e) {
            $result = ["success"=>false, "message"=>$e];
        }

        return response()->json($result);
    }

    //удалить мероприятие
    public function deleteEvent($id)
    {
        $delete_event = Events::find($id);
        $delete_event->delete();

        dd($delete_event);
    }

    //изменить мероприятие
    public function putEvent($id, Request $request)
    {
        try {
            $param = $request->request->all();
            $put_event = Events::find($id);

            $put_event['datetime'] = $param['datetime'];
            $put_event['title'] = $param['title'];
            $put_event['description'] = $param['description'];

            $put_event->save();
            $result = ["success"=> true, "message"=>$put_event];
        } catch (\Exception $e) {
            $result = ["success"=>false, "message"=>$e];
        }

        return response()->json($result);
    }
}
