<!DOCTYPE html>
<html>
    <head>
        @include('user.css')
    </head>
<title>
myappointment
</title>


<body>
    <!-- Start navbar-->
  @include('user.navbar')
  <!--end navbar-->
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
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>doctor name</th>
                                    <th>date</th>
                                    <th>message</th>
                                    <th>status</th>
                                    <th>##</th>
                                    
                                </tr>
                            </thead>


                            <tbody>
                            @php
                                $i = 0;
                            @endphp
                                @foreach($appoint as $invoices)
                                @php
                                    $i++
                                @endphp
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{ $invoices->name }}</td>
                                <td>{{ $invoices->email }}</td>
                                <td>{{ $invoices->phone }}</td>
                                <td>{{ $invoices->doctor }}</td>
                                <td>{{ $invoices->date }}</td>
                                <td>{{ $invoices->message }}</td>
                                <td>{{ $invoices->status }}</td>
                                  
                                
                                <td>
                                    <a class="bt btn-danger" onclick="return confirm('are you sure delate this')" href="{{url('cancel_appoint',$invoices->id)}}">delete</a>
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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
    
    @include('user.footer')
</body>
</html> 