@extends('bootstrap')
@section('page_content')


        <!DOCTYPE html>

<html ng-app="demoApp" lang="en">
<head>
    <title id='Description'>Appointment Scheduler
    </title>
    <script type="text/javascript" src="../../public/js/jquery-2.2.3.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../../public/js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../../public/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="../../public/css/mdb.min.css" rel="stylesheet">

    <!-- Your custom styles (optional) -->
    <link href="../../public/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../../public/js/mdb.min.js"></script>
    <meta name="description" content="AngularJS Scheduler example. This example demonstrates a Scheduling widget built with AngularJS." />
    <link rel="stylesheet" href="../../public/js/jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="../../public/js/jquery-3.11.1.min.js"></script>
    <script type="text/javascript" src="../../public/js/angular.min.js"></script>
    <script type="text/javascript" src="../../public/js/demos.js"></script>
    <script type="text/javascript" src="../../public/js/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="../../public/js/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="../../public/js/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="../../public/js/jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="../../public/js/jqwidgets/jqxdate.js"></script>
    <script type="text/javascript" src="../../public/js/jqwidgets/jqxscheduler.js"></script>
    <script type="text/javascript" src="../../public/js/jqwidgets/jqxscheduler.api.js"></script>
    <script type="text/javascript" src="../../public/js/jqwidgets/jqxdatetimeinput.js"></script>
    <script type="text/javascript" src="../../public/js/jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="../../public/js/jqwidgets/jqxcalendar.js"></script>
    <script type="text/javascript" src="../../public/js/jqwidgets/jqxtooltip.js"></script>
    <script type="text/javascript" src="../../public/js/jqwidgets/jqxwindow.js"></script>
    <script type="text/javascript" src="../../public/js/jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="../../public/js/jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="../../public/js/jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="../../public/js/jqwidgets/jqxnumberinput.js"></script>
    <script type="text/javascript" src="../../public/js/jqwidgets/jqxradiobutton.js"></script>
    <script type="text/javascript" src="../../public/js/jqwidgets/jqxinput.js"></script>
    <script type="text/javascript" src="../../public/js/jqwidgets/globalization/globalize.js"></script>
    <script type="text/javascript" src="../../public/js/jqwidgets/jqxangular.js"></script>
    <script type="text/javascript">
        var demoApp = angular.module("demoApp", ["jqwidgets"]);
        demoApp.controller("demoController", function ($scope) {
            var appointments = new Array();
            // prepare the data
            var source =
            {
                dataType: "array",
                dataFields: [
                    { name: 'id', type: 'string' },
                    { name: 'description', type: 'string' },
                    { name: 'location', type: 'string' },
                    { name: 'subject', type: 'string' },
                    { name: 'calendar', type: 'string' },
                    { name: 'start', type: 'date' },
                    { name: 'end', type: 'date' }
                ],
                id: 'id',
                localData: appointments
            };
            $scope.settings = {
                date: new $.jqx.date(2016, 10, 23),
                width: 850,
                height: 600,
                source: source,
                view: 'weekView',
                showLegend: true,
                created: function (args) {
                    args.instance.ensureAppointmentVisible('id1');
                },
                resources:
                {
                    colorScheme: "scheme05",
                    dataField: "calendar",
                    source:  new $.jqx.dataAdapter(source)
                },
                appointmentDataFields:
                {
                    from: "start",
                    to: "end",
                    id: "id",
                    description: "description",
                    location: "place",
                    subject: "subject",
                    resourceId: "calendar"
                },
                views:
                        [
                            'dayView',
                            'weekView',
                            'monthView'
                        ]
            };
        });
    </script>
</head>
<body ng-controller="demoController" class="centercard" ><!--  id="container"  -->
<header>

    <h2 class="w3-center">Schedule Your Appointment</h2>
    <!--Navbar-->
    <nav class="navbar navbar-dark navbar-fixed-top scrolling-navbar primary-color">

        <!-- Collapse button-->
        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx">
            <i class="fa fa-bars"></i></button>

        <div class="container">

            <!--Collapse content-->
            <div class="collapse navbar-toggleable-xs" id="collapseEx">
                <!--Navbar Brand
                <a class="navbar-brand" href="http://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">MDB</a>
                <!--Links-->
                <ul class="nav navbar-nav">
                    <li class="nav-item {{Request::is('/') ? 'active' : ''}}"><a class="nav-link" href="/"><i class="fa fa-home" aria-hidden="true"></i> Home <span class="sr-only">(current)</span></a></li>
                    <li class="nav-item {{Request::is('inventory') ? 'active' : ''}}"><a class="nav-link" href="/inventory"><i class="fa fa-car" aria-hidden="true"></i> Stock </a></li>
                    <li class="nav-item {{Request::is('schedule') ? 'active' : ''}}"><a class="nav-link" href="/schedule"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Appointments</a></li>
                    <li class="nav-item {{Request::is('about') ? 'active' : ''}}"><a class="nav-link" href="/about"><i class="fa fa-info" aria-hidden="true"></i> About</a></li>
                    <li class="nav-item {{Request::is('contact') ? 'active' : ''}}"><a class="nav-link" href="/contact"><i class="fa fa-volume-control-phone" aria-hidden="true"></i> Contact</a></li>
                    <li class="nav-item {{Request::is('feedback') ? 'active' : ''}}"><a class="nav-link" href="/feedback"><i class="fa fa-comments-o" aria-hidden="true"></i> Feedback </a></li>
                </ul>
                <ul class="nav navbar-nav nav-flex-icons">
                    <li class ="nav-link nav-item"><a href="/signin"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign in </a></li>
                    <li class ="nav-link nav-item" ><a href="/signup"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign up </a></li>
                </ul>
            </div>
            <!--/.Collapse content-->
        </div>
    </nav>
    <!--/.Navbar-->
</header>
<jqx-scheduler jqx-settings="settings" id="scheduler"></jqx-scheduler>





</body>

<footer>






</footer>


</html>
@stop
