@extends('layouts.app')

@section('content')
    <!-- start button ------------------------------------------------------------------------>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Table</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
     <!-- stop button ------------------------------------------------------------------------->

<style>
/* ======================================================================= */
        .table-bordered {
            border: 2px solid #000; /* Darker border */
        }

        .table-bordered th,
        .table-bordered td {
            width:auto;
            padding: 4px; /* Adjust as needed */
            vertical-align: middle; /* Center content vertically */
            
            border: 2px solid #000; /* Darker border for cells */
        }
         /* Adjust table width to 50% */
         .table-container {
            width:auto;
            margin: 5 auto;
        }
        

        /* Reduce the size of input fields */
        .form-control {
            height: 30px;
            padding: 0px 0px;
            font-size: 12px;
        }

        /* Reduce margins around labels and input fields */
        .form-group {
            margin-bottom: 0px;
        }
        label {
            margin-bottom: 0px;
            font-size: 16px solid #000;
        }

        /* Increase the border thickness of table rows */
        .custom-table th, .custom-table td {
            border: 2px solid #000;
            
        }

        /* Match RPM display field width for last column fields */
        .small-input {
            width: 100%;
        }

        /* Add some spacing between table and buttons */
        .btn-container {
            margin-top: 20px;
            text-align: center;
        }
        .btn  {
            background-color:#d3d3d3;
        }

/* ======================================================================= */


    
    </style>
 <!-- test plan start ------------------------------------------------------------------------>
 <body>

 @include('pages.loader')
@include('pages.dropdown')
@include('pages.offline') 
            <div class="form-area">
                <form method="POST" action="{{ route('employee.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Rig Name</label>
                            <input type="text" class="form-control" name="rig_name">
                        </div>
                        <div class="col-md-6">
                            <label>Date</label>
                            <input type="date" class="form-control" name="date">
                            </div>
                    </div>
      
                    <div class="row">
                        <div class="col-md-12">
                            <label>Status</label>
                            <input type="text" class="form-control" name="status">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Time</label>
                            <input type="text" class="form-control" name="time">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Cycles</label>
                            <input type="text" class="form-control" name="cycles">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Shift_Mode</label>
                            <input type="text" class="form-control" name="shift_mode">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>RPM</label>
                            <input type="text" class="form-control" name="rpm">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Pressure</label>
                            <input type="text" class="form-control" name="pressure">
                        </div>
                        <div class="col-md-6">
                            <label>GB_Temp.</label>
                            <input type="text" class="form-control" name="gb_temp">
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Oil_Temp.</label>
                            <input type="text" class="form-control" name="oil_temp">
                        </div>
                        <div class="col-md-6">
                            <label>Motor_Temp.</label>
                            <input type="text" class="form-control" name="motor_temp">
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-info" value="Register">
                        </div>

                     </div>
                       </form>
                     </div>
        
@endsection


@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
              background-color:#d3d3d3;
        }

        .bi-trash-fill{
            color:red;
            font-size: 18px;
        }

        .bi-pencil{
            color:green;
            font-size: 18px;
            margin-left: 20px;
        }
    </style>
@endpush