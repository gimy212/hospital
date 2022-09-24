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

        @if(session()->has('message'))
        {{dd('vbnm')}}
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

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
                    <h4 class="page-title">Edit doctprs</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">doctors</h4>

                        <form action="{{ route('Doctors.update', $doctors->id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
							{{ method_field('PATCH') }}

                            <div class="form-group">
                                <label for="name" class="col-form-label">Name</label>
                                <input type="name" name="name" class="form-control" id="name" placeholder="Name"value="{{ $doctors->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-form-label">phone</label>
                                <input type="number" name="phone" class="form-control" id="phone" placeholder="phone"value="{{ $doctors->phone }}">
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-form-label">specialization</label>
                                <input type="name" name="specialization" class="form-control" id="specialization" placeholder="specialization"value="{{ $doctors->specialization }}">
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-form-label">room number</label>
                                <input type="number" name="room" class="form-control" id="room" placeholder="room numder"value="{{ $doctors->room }}">
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-form-label">notes</label>
                                <input type="name" name="notes" class="form-control" id="notes" placeholder="notes"value="{{ $doctors->notes }}">
                            </div>
                            <div style="padding:15px;">
                                <label >old Photo</label>
                                <img src="doctorimage/{{($doctors->file)}}" width='50' height='50'  />
                            </div>
                            <div class="form-group">
                                <label for="">Photo</label>
                                <input  type="file"  id="file" name="file" >
                            </div>



                            <center> <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button> </center>

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