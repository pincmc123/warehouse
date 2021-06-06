@extends('master')


@section('link')

 <!-- Bootstrap Core CSS -->
 <link href="{{asset('startmin-master/css/bootstrap.min.css')}}" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="{{asset('startmin-master/css/metisMenu.min.css')}}" rel="stylesheet">

<!-- DataTables CSS -->
<link href="{{asset('startmin-master/css/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="{{asset('startmin-master/css/dataTables/dataTables.responsive.css')}}" rel="stylesheet">

<!-- Custom CSS -->
<link href="{{asset('startmin-master/css/startmin.css')}}" rel="stylesheet">

<!-- Custom Fonts -->
<link href="{{asset('startmin-master/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

@endsection

@section('content')


<div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Tables</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    DataTables Advanced Tables
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                <th>Id</th>
                                                    <th>Seri</th>
                                               <th>Ngày nhập</th>       <th>Lý do nhập</th>
                                                  
                                                    <th>Ngày xuất</th>
                                                    <th>Lý do xuất</th>

                                                </tr>
                                            </thead>
                                            <tbody>                                              
                                                
                                                @foreach($datas as $data)
                                                <tr>
                                                <td>{{$data->id}}</td>
                                                    <td>{{$data->seri}}</td>
                                                    <td>{{$data->date}}</td>     
                                                    <td>{{$data->reason_name}}</td>                                                                 
                                                    <td>@if($data->arline_id != "")  {{\App\Models\arinvoiceline::find($data->arline_id)->date }}  @endif </td>
                                                    <td>@if($data->arline_id != "")  {{\App\Models\arinvoiceline::find($data->arline_id)->reason_name }}  @endif </td>                                   

                                                </tr>
                                                @endforeach
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                 <!--   <div class="well">
                                                      <a class="btn btn-default btn-lg btn-block"  href="{{route('newinputadd')}}">ADD NEW</a>
                                    </div>-->
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

@endsection

@section('script')
    
   <!-- jQuery -->
   <script src="{{asset('startmin-master/js/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('startmin-master/js/bootstrap.min.js')}}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{asset('startmin-master/js/metisMenu.min.js')}}"></script>

<!-- DataTables JavaScript -->
<script src="{{asset('startmin-master/js/dataTables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('startmin-master/js/dataTables/dataTables.bootstrap.min.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{asset('startmin-master/js/startmin.js')}}"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
</script>



@endsection