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
   
@if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session()->has('oop'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('oop') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session()->has('delete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('delete') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
   
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Datatables</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Datatables</h4>
                   
                </div>
            </div>
        </div>
        <!-- end page title -->




        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title">doctors</h4>

                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>phone</th>
                                    <th>specialization</th>
                                    <th>room number</th>
                                    <th>notes</th>
                                    <th>image</th>
                                </tr>
                            </thead>


                            <tbody>
                            @php
                                $i = 0;
                            @endphp
                                @foreach($doctors as $invoices)
                                    @php
                                        $i++
                                    @endphp
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{ $invoices->name }}</td>
                                    <td>{{ $invoices->phone }}</td>
                                    <td>{{ $invoices->specialization }}</td>
                                    <td>{{ $invoices->room }}</td>
                                    <td>{{ $invoices->notes }}</td>
                                    <td>  <img src="doctorimage/{{($invoices->file)}}" width='50' height='50'  />
                                      
                                    
                                    <td>
                                        <div class="row row-xs wd-xl-4p">
                                            <a href="{{ route('Doctors.edit', $invoices->id) }}" class="action-icon">
                                            <i class="mdi mdi-square-edit-outline"></i> </a>
                                            <!-- <button type="button" class="btn btn-warning btn-xs waves-effect waves-light">Btn Xs</button> -->
                                            <form action="{{ route('Doctors.edit', $invoices->id) }}" >
                                                @csrf
                                                @method('DELETE')
                                                <button style ="border-color:white; color:blue; font-size: 0.8rem;" class="action-icon update" type="submit"> <i class="mdi mdi-update"></i></button>
                                            </form>
                                            <form action="{{ route('Doctors.destroy', $invoices->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button style ="border-color:white; color:red; font-size: 0.8rem;" class="action-icon delete" type="submit"> <i class="mdi mdi-delete"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach


                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->






    </div> <!-- container -->
@endsection
@section('js')
<!-- Internal Treeview js -->
<script src="{{URL::asset('assets/plugins/treeview/treeview.js')}}"></script>
@endsection