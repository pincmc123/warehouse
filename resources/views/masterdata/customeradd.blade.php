@extends('master')


@section('link')

  <!-- Bootstrap Core CSS -->
  <link href="{{asset('startmin-master/css/bootstrap.min.css')}}" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="{{asset('startmin-master/css/metisMenu.min.css')}}" rel="stylesheet">

<!-- Custom CSS -->
<link href="{{asset('startmin-master/css/startmin.css')}}" rel="stylesheet">

<!-- Custom Fonts -->
<link href="{{asset('startmin-master/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

@endsection

@section('content')

<div id="wrapper">

<!-- Navigation -->


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Forms</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Basic Form Elements
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" action="{{route('customerpost')}}" method="POST">
                                <input name="add" value="add" type="hidden">     
                                @csrf <div class="form-group">
                                        <label>Customer Code</label>
                                        <input class="form-control" name="code">                                  
                                    </div>
                                    <div class="form-group">
                                        <label>Customer Name</label>
                                        <input class="form-control" name="name">                                  
                                    </div>
                                    <div class="form-group">
                                        <label>Contact</label>
                                        <input class="form-control" name="contact">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input class="form-control" name="phone">
                                    </div>     
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" name="email">
                                    </div>     
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input class="form-control" name="address">
                                    </div>                                                                                                                                                   
                                    <div class="form-group">
                                        <label>Active</label>
                                        <label class="radio-inline">
                                            <input type="radio" name="isActive" value="1" checked>Yes
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="isActive" value="0">No
                                        </label>                                      
                                    </div>                                
                                    <button type="submit" class="btn btn-default">Submit Button</button>
                                    <button type="reset" class="btn btn-default">Reset Button</button>
                                </form>
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                           
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

@endsection

@section('script')
 
   <!-- jQuery -->
   <script src="{{asset('startmin-master/js/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('startmin-master/js/bootstrap.min.js')}}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{asset('startmin-master/js/metisMenu.min.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{asset('startmin-master/js/startmin.js')}}"></script>

@endsection