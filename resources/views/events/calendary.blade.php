@extends('layouts.main_page')
    @section('css_link')
        <link rel="stylesheet" href="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.css" />
    @endsection
    @section('content')
        <div id="calendar" style="height: 800px"></div>
    @endsection

    @section('js_link')
        <script src="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.js"></script>

        <script>
            const container = document.getElementById('calendar');

            const options = {
                defaultView: 'month',
                isReadOnly: true,
                language: 'ru',

            };

            const calendar = new tui.Calendar(container, options);
            calendar.createEvents([
                @foreach($event_list as $event)
                    {
                        id: 'event1',
                        calendarId: 'cal2',
                        title: '{{$event->title}}',
                        start: '{{$event->datetime}}',
                        end: '{{$event->datetime}}',
                    },
                @endforeach
            ]);
        </script>

        </script>
    @endsection
