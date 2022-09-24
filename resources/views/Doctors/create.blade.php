@extends('layouts.master')
@section('css')
<!--Internal  Font Awesome -->
<link href="{{URL::asset('assets/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
<!--Internal  treeview -->
<link href="{{URL::asset('assets/plugins/treeview/treeview-rtl.css')}}" rel="stylesheet" type="text/css" />
@section('title')
اضافة الصلاحيات 
@stop

@endsection
@section('content')


    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Elements</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add doctors</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->




        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">doctors</h4>

                        <form action="{{ route('Doctors.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="col-form-label">Name</label>
                                <input type="name" name="name" class="form-control" id="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-form-label">phone</label>
                                <input type="number" name="phone" class="form-control" id="phone" placeholder="phone">
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-form-label">specialization</label>
                                <input type="name" name="specialization" class="form-control" id="specialization" placeholder="specialization">
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-form-label">room number</label>
                                <input type="number" name="room" class="form-control" id="room" placeholder="room numder">
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-form-label">notes</label>
                                <input type="name" name="notes" class="form-control" id="notes" placeholder="notes">
                            </div>
                            <div class="form-group">
                                <label for="">Photo</label>
                                <input  type="file"  id="file" name="file"  value="" required>
                            </div>


                            <center><button type="submit" class="btn btn-success waves-effect waves-light">Add</button></center>

                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->



    </div> <!-- container -->
@endsection
@section('js')
<!-- Internal Treeview js -->
<script src="{{URL::asset('assets/plugins/treeview/treeview.js')}}"></script>
@endsection