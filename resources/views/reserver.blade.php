@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div id='wrap'>
                <div id='calendar'>
                </div>
                <div style='clear:both'>
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>

                    <h4 class="modal-title" id="myModalLabel">Make reservation</h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <p class="statusMsg"></p>

                    <form role="form" id="contact_form" action="{{url('/download')}}" method="POST">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="inputName">Name</label>
                            <input type="text" name="Name" class="form-control" id="inputName"
                                   placeholder="Enter name"/>
                        </div>


                        <div class="form-group">
                            <label for="inpatient">Prenom</label>
                            <input type="text" name="Prenom" class="form-control" id="inpatient"
                                   placeholder="Enter prenom"/>
                        </div>


                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input type="email" name="emaill" class="form-control" id="inputEmail"
                                   placeholder="Enter email"/>
                        </div>


                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="text" name="age" class="form-control" id="age" placeholder="Enter Age"/>
                        </div>


                        <div class="form-group">
                            <label for="telephone">Telephone</label>
                            <input type="text" name="telephone" class="form-control" id="telephone"
                                   placeholder="Enter Telephone"/>
                        </div>

                        <div class="form-group">
                            <label for="num">Nombre</label>
                            <input type="text" name="Nombre" class="form-control" id="num" placeholder="Enter Nombre"/>
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Laser Game</label>
                            <select class="form-control" name="lasergame" id="exampleFormControlSelect1">
                                <option>Ouuui</option>
                                <option>Nooon</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Type de Payement</label>
                            <select class="form-control" name="typepayement" id="exampleFormControlSelect1">
                                <option>Sur Place</option>
                                <option>Paypal card</option>
                            </select>
                        </div>


                        <!-- Modal Footer -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary submitBtn" onclick="submitContactForm()">
                                SUBMIT
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    {{--@if (session('alert'))--}}
    {{--<div class="alert alert-success">--}}
    {{--{{ session('alert') }}--}}
    {{--</div>--}}
    {{--@endif--}}



    <!-- Modal -->
    <div id="myModal2" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">All Reservation</h4>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th><h3> ID </h3></th>
                            <th><h3> Name </h3></th>
                            <th><h3> Date de Reservation </h3></th>
                        </tr>
                        @foreach($reservations as $reservation)
                            <tr>
                                <th>{{$reservation->id}}</th>
                                <th>{{$reservation->name}}</th>
                                <th>{{$reservation->date_deb}}</th>
                                <!--th> <button type="button" class="btn btn-primary submitBtn" onclick="SupprimerReservation()">Delete </button></th-->
                                <th>
                                    <form id="contact_form" action="{{url('/delete/'.$reservation->id)}}"
                                          method="POST">
                                        {!! csrf_field() !!}


                                        <button type="submit" class="btn btn-primary submitBtn">
                                            Delete
                                        </button>


                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>





@endsection



@section('js')


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{asset('js/jquery1.js')}}"></script>
    <script src="{{asset('js/boustrap.js')}}"></script>

    <script src="{{asset('js/demo.js')}}"></script>
    <script src="{{asset('js/fullcalendar.js')}}"></script>



    <script>

        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if (exist) {
            alert(msg);
        }


        var a, b, c;

        function submitContactForm() {
            var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

            //console.log(a);
            //console.log(a.toISOString().slice(0, 19).replace('T', ' '));
            f = a.toISOString().slice(0, 19).replace('T', ' ');
            g = c.toISOString().slice(0, 19).replace('T', ' ');
            s = f.split(' ');
            x = g.split(' ');

            var name = $('#inputName').val();
            var email = $('#inputEmail').val();
            var prenom = $('#inpatient').val();
            var telephone = $('#telephone').val();
            var nbr = $('#num').val();
            var age = $('#age').val();
            var type = $('#exampleFormControlSelect1').val();
            var laser = $('#exampleFormControlSelect2').val();
            //var delay = 2000;


            var _tokenn = '{{csrf_token()}}';

            if (name.trim() == '') {
                alert('Please enter your name.');
                $('#inputName').focus();
                return false;
            } else if (email.trim() == '') {
                alert('Please enter your email.');
                $('#inputEmail').focus();
                return false;
            } else if (email.trim() != '' && !reg.test(email)) {
                alert('Please enter valid email.');
                $('#inputEmail').focus();
                return false;

            } else {

//
                $.ajaxSetup({
                    headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
                });


                $.ajax({
                    type: 'POST',
                    url: '{{url('/save')}}',
                    //dataType: "json",
                    //data:JSON.stringify(obj),
                    data: {
                        _token: _tokenn,
                        nom: name,
                        mail: email,
                        pre: prenom,
                        phone: telephone,
                        nombre: nbr,
                        year: age,
                        debut: f,
                        fin: g,
                        type: type,
                        laser: laser,
                        date_d: s[0],
                        heure_d: s[1],
                        date_f: x[0],
                        heure_f: x[1]
                    },

                    success: function (msg) {
                        alert("Le Client est bien enregistre");

                        setTimeout($.ajax({
                            type: 'POST',
                            url: '{{url('/Envoi')}}',

                            data: {
                                _token: _tokenn,
                                nom: name,
                                mail: email,
                                pre: prenom,
                                phone: telephone,
                                nombre: nbr,
                                year: age,
                                debut: f,
                                fin: g,
                                date_d: s[0],
                                heure_d: s[1],
                                date_f: x[0],
                                heure_f: x[1]
                            },

                            success: function (msg) {
                                alert("Le message Mail a étè envoyer");
                                $("#myModal").modal("hide");
                            }
                        }), 10);
                    },

                    error: function (msg) {
                        alert('Vous pouvez faire une reservation a cette Date');
                        $("#myModal").modal("hide");
                    }
                });
            }
            {{--@if(Session::has('msg'))--}}
            {{--{{Session::get('msg')}}--}}
            {{--@endif--}}
        }


        $(document).ready(function () {

            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            /*  className colors

             className: default(transparent), important(red), chill(pink), success(green), info(blue)

             */


            /* initialize the external events
             -----------------------------------------------------------------*/


            $('#external-events div.external-event').each(function () {

                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                };

                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject);


                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 999,
                    revert: true,      // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                });

            });


            /* initialize the calendar
             -----------------------------------------------------------------*/

            var calendar = $('#calendar').fullCalendar
            ({
                header: {
                    left: 'title',
                    center: 'agendaDay,agendaWeek,month',
                    right: 'prev,next today'
                },
                editable: true,
                firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
                selectable: true,
                defaultView: 'month',

                axisFormat: 'h:mm',
                columnFormat: {
                    month: 'ddd',    // Mon
                    week: 'ddd d', // Mon 7
                    day: 'dddd M/d',  // Monday 9/7
                    agendaDay: 'dddd d'
                },
                titleFormat: {
                    month: 'MMMM yyyy', // September 2009
                    week: "MMMM yyyy", // September 2009
                    day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
                },
                allDaySlot: false,
                selectHelper: true,


                select: function (start, end, allDay) {
                    a = start;
                    b = allDay;
                    c = end;

                    if (!allDay) {
                        $('#myModal').modal('show');

                    } else {
                        $('#myModal2').modal('show');

                    }

                    /*
                     if (title) {
                     calendar.fullCalendar('renderEvent',
                     {
                     title: title,
                     start: start,
                     end: end,
                     allDay: allDay
                     },
                     true // make the event "stick"
                     );
                     }
                     calendar.fullCalendar('unselect');
                     */

                },


                droppable: true, // this allows things to be dropped onto the calendar !!!


                drop: function (date, allDay) { // this function is called when something is dropped

                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject');

                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject);

                    // assign it the date that was reported
                    copiedEventObject.start = date;
                    copiedEventObject.allDay = allDay;

                    // render the event on the calendar
                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }

                },


                events: [

                        @foreach($reservations as $reservation)
                    {

                        title: '{{$reservation->name}}',
                        start: '{{$reservation->date_deb}}',
                        allDay: false,
                        className: 'success'
                    },
                    @endforeach

                ]


            });
        });

    </script>
@endsection



@section('css')
    <link href="{{asset('css/fullcalendar.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/fullcalender.print.css')}}" rel="stylesheet" media='print'/>
    <link href="{{asset('css/modalcss.css')}}" rel="stylesheet"/>


@endsection