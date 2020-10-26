@extends('layouts.master')
@section('header')
    <link href="../../assets/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="../../assets/extra-libs/calendar/calendar.css" rel="stylesheet" />
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    @endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="">
                        <div class="col-lg-9">
                            <div class="card-body b-l calender-sidebar">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/dist/js/jquery-ui.min.js"></script>
    <script src="/assets/libs/moment/min/moment.min.js"></script>
    <script src="/assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="/assets/libs/fullcalendar/dist/locale/ar.js"></script>
{{--    <script src="/dist/js/pages/calendar/cal-init.js"></script>--}}
    <script>
        ! function($) {
            "use strict";

            var CalendarApp = function() {
                this.$body = $("body")
                this.$calendar = $('#calendar'),
                    this.$event = ('#calendar-events div.calendar-events'),
                    this.$categoryForm = $('#add-new-event form'),
                    this.$extEvents = $('#calendar-events'),
                    this.$modal = $('#my-event'),
                    this.$saveCategoryBtn = $('.save-category'),
                    this.$calendarObj = null
            };


            /* on drop */

                /* on click on event */
                CalendarApp.prototype.onEventClick = function(calEvent, jsEvent, view) {

                },

            /* Initializing */
            CalendarApp.prototype.init = function() {
                /*  Initialize the calendar  */
                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                var form = '';
                var today = new Date($.now());
                function randomInt(min, max) {
                    return min + Math.floor((max - min) * Math.random());
                }
                var colors=[];
                    colors['pending']='#2961ff';
                    colors['fail']='rgb(229,87,46)';
                    colors['finished']='rgb(40,183,121)';

                var defaultEvents = [

                        @foreach($tasks as $task)
                    {
                        id: '{{$task->id}}',
                        title: '{{$task->title}}',
                        url: "/edittask/{{$task->id}}",
                        // start:'2020-10-12T20:00:00Z',
                        start: '{{$task->start_date}}',
                        end: '{{$task->end_date}}',
                        color:colors['{{$task->status}}'],
                        display:'block'
                    },
                        @endforeach

                ];

                var $this = this;
                $this.$calendarObj = $this.$calendar.fullCalendar({
                    local:'ar',
                    timeZone: 'UTC',
                    defaultView: 'month',
                    header: {
                        left: 'next,prev today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },


                    events: defaultEvents,

                    eventClick: function(calEvent, jsEvent, view) { $this.onEventClick(calEvent, jsEvent, view); }

                });


            },

                //init CalendarApp
                $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp
        }(window.jQuery),

//initializing CalendarApp
            $(window).on('load', function() {

                $.CalendarApp.init()
            });
    </script>
@endsection
