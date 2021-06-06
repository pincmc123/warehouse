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
                        <form role="form" action="{{route('newoutputpostadd')}}" method="POST" autocomplete="off">
                        <div class="row">
                            <div class="col-lg-6">    
                                <input name="type" value="NEW" type="hidden">     
                                @csrf 
                                    <div class="form-group">
                                        <label>Phiếu</label>
                                        <input class="form-control" name="code">                                  
                                    </div>
                                    <div class="form-group">
                                        <label>Khách hàng</label>
                                        <select class="form-control" name="customer">
                                        <option></option>
                                        @foreach (\App\Models\customer::all() as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                         @endforeach
                                         </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nhân viên</label>
                                        <select class="form-control" name="user">
                                        <option></option>
                                        @foreach (\App\Models\user::where('role','<>','ADMIN')->get() as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                         @endforeach
                                         </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Ghi chú</label>
                                        <input class="form-control" name="note">
                                    </div>
                                    <div class="form-group">
                                        <label>Lý do</label>
                                        <select class="form-control" name="reason">
                                        <option></option>
                                        @foreach (\App\Models\reason::where('is_input','=','0')->where('type','=','NEW')->get() as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                         @endforeach
                                         </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tiền tệ</label>
                                        <select class="form-control" name="currency">
                                        <option>VND</option>
                                        <option>$</option>                               
                                         </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input class="form-control" name="date" type="date">
                                    </div>     
                                                                                                                                                      
                                   <!-- <div class="form-group">
                                        <label>Active</label>
                                        <label class="radio-inline">
                                            <input type="radio" name="isActive" value="1" checked>Yes
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="isActive" value="0">No
                                        </label>                                      
                                    </div>         -->                       
                                    <button type="submit" class="btn btn-default">Submit Button</button>
                                    <button type="reset" class="btn btn-default">Reset Button</button>
                                
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                           <div class="col-lg-6">
                               <div class="form-group">            
                                     <label>Item</label>                       
                                        <select class="form-control" id="item">
                                        <option value="0"></option>
                                        @foreach (\App\Models\item::where('is_active','<>','0')->get() as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                         @endforeach
                                         </select>
                                </div>
                           
                               <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">                                         
                                            <tbody id="table">
                                                                                 
                                            </tbody>
                                        </table>
                                    </div>
                           </div>
                        </div>
                        </form> 
                          <!-- /.col-lg-6 (nested) -->
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

<div>

@foreach(\App\Models\item::where('is_active','<>','0')->get() as $item)
<datalist id="{{$item->id}}">
@foreach(\App\Models\apinvoiceline::where('item_id','=',$item->id)->where('is_open','=',1)->where('type','=','NEW')->get('seri') as $seri)
        <option value="{{$seri->seri}}" />
@endforeach
</datalist>
</div>
@endforeach

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

<script>
     $(document).ready(function() {
      
var i=0;
    $("#item").change(function(){   
       i++;
//alert('Selected value: ' + $(this).val());
$("#table").append(' <tr > <input type="hidden" name="item['+ i +'][id]" value="'+$(this).val()+'"/> <td style="vertical-align: middle">'+$(this).val()+'</td>  <td style="vertical-align: middle">'+$(this).text()+'</td>  <td>  <input  class="form-control" list="'+$(this).val()+'" name="item['+i+'][seri]"></td> <td>  <input  class="form-control" name="item['+i+'][price]"></td> <td  style="vertical-align: middle" class="btnSelectstatus">Remove</td>  </tr>   ');
$("#item").val('0');
});

$("#table").on('click','.btnSelectstatus',function(){
         // get the current row
         var currentRow=$(this).closest("tr"); 
       
         currentRow.remove();



       
    });


});
</script>

@endsection