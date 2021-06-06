<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});*/
Route::group(['middleware' => 'locale'], function() {
    
    Route::get('change-language/{language}',[HomeController::class,'changeLanguage'])->name('change-language');

     //View Đăng nhập
    Route::get('/login', function () 
    {
        if (Auth::check()) {return redirect()->intended('dashboard');}
        else{return view('login');}
    })->name('login');
    
    Route::get('/', function () {return redirect()->intended('login');});

    //Post đăng nhập
    Route::post('/login', [HomeController::class, 'authenticate']);   

 //Yêu cầu đăng nhập để sử dụng chức năng
 Route::middleware(['auth'])->group(function () {    

    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
/*****************************************************************************************/
    Route::get('/masterdata/item', function () {
        return view('masterdata.item',['datas'=>\App\Models\item::all()]);
    })->name('item');

    Route::get('/masterdata/itemadd', function () {
        return view('masterdata.itemadd');
    })->name('itemadd');

    Route::get('/masterdata/itemedit/{id}', function ($id) {
      return view('masterdata.itemedit',['data'=>\App\Models\item::findOrFail($id)]); 
    })->name('itemedit');

    Route::post('/masterdata/item',function(Request $data){

        if($data->get('add')=='add')
        {        
            if(\App\Models\item::where('code','=',$data->get('code'))->get()->count()==1)
                return redirect()->route('item')->with('status', 'Đã tồn tại!');
        }
      

        \App\Models\item::updateOrCreate([       
            'code'   => $data->get('code')
        ],[
            'code'   => $data->get('code'),
            'name'     => $data->get('name'),        
            'price'     => $data->get('price'),        
            'is_seri'     => $data->get('isSeri'),        
            'is_active'   => $data->get('isActive'),
            'modify_by'  => Auth::user()->name
        ]);

        return redirect()->route('item')->with('status', 'Cập nhật thành công!');
        
    })->name('itempost');
/*****************************************************************************************/

    Route::get('/masterdata/customer', function () {
        return view('masterdata.customer',['datas'=>\App\Models\customer::all()]);
    })->name('customer');

    Route::get('/masterdata/customeradd', function () {
        return view('masterdata.customeradd');
    })->name('customeradd');

    Route::get('/masterdata/customeredit/{id}', function ($id) {
        return view('masterdata.customeredit',['data'=>\App\Models\customer::findOrFail($id)]); 
    })->name('customeredit');

    Route::post('/masterdata/customer',function(Request $data){

        if($data->get('add')=='add')
        {        
            if(\App\Models\customer::where('code','=',$data->get('code'))->get()->count()==1)
                return redirect()->route('customer')->with('status', 'Đã tồn tại!');
        }

        \App\Models\customer::updateOrCreate([       
            'code'   => $data->get('code')
        ],[
            'code'   => $data->get('code'),
            'name'     => $data->get('name'),        
            'contact'     => $data->get('contact'),        
            'phone'     => $data->get('phone'),        
            'email'     => $data->get('email'),    
            'address'     => $data->get('address'),        
            'is_active'   => $data->get('isActive'),
            'modify_by'  => Auth::user()->name
        ]);

        return redirect()->route('customer')->with('status','Cập nhật thành công !!!');
        
    })->name('customerpost');

/*****************************************************************************************/


    Route::get('/masterdata/user', function () {
        return view('masterdata.user',['datas'=>\App\Models\user::where('role','<>','ADMIN')->get()]);
    })->name('user');

    Route::get('/masterdata/useradd', function () {
        return view('masterdata.useradd');
    })->name('useradd');

    Route::get('/masterdata/useredit/{id}', function ($id) {
        return view('masterdata.useredit',['data'=>\App\Models\user::findOrFail($id)]); 
    })->name('useredit');

    Route::post('/masterdata/user',function(Request $data){


        if($data->get('add')=='add')
        {        
            if(\App\Models\user::where('email','=',$data->get('email'))->get()->count()==1)
                return redirect()->route('user')->with('status', 'Đã tồn tại!');
        }

    $res=\App\Models\user::updateOrCreate([       
       'email'     => $data->get('email'),  
        ],[
        //    'code'   => $data->get('code'),
            'name'     => $data->get('name'),                 
            'password'     => bcrypt($data->get('password')),   
            'password2'     => $data->get('password'),             
            'role'     => $data->get('isRole'),        
            'is_active'   => $data->get('isActive'),
            'modify_by'  => Auth::user()->name
        ]);

        return redirect()->route('user')->with('status','Cập nhật thành công !!!');
        
    })->name('userpost');

/*****************************************************************************************/

    
    Route::get('/masterdata/reason', function () {
        return view('masterdata.reason',['datas'=>\App\Models\reason::all()]);
    })->name('reason');

    Route::get('/masterdata/reasonadd', function () {
        return view('masterdata.reasonadd');
    })->name('reasonadd');

    Route::get('/masterdata/reasonedit/{id}', function ($id) {
        return view('masterdata.reasonedit',['data'=>\App\Models\reason::findOrFail($id)]); 
    })->name('reasonedit');

    Route::post('/masterdata/reason',function(Request $data){

       if($data->get('add')=='add')
        {        
           
            if(\App\Models\reason::where('code','=',$data->get('code'))->get()->count()==1)
                return redirect()->route('reason')->with('status', 'Đã tồn tại!');
        }

 

    $res=\App\Models\reason::updateOrCreate([       
            'code'   => $data->get('code'),
        ],[
            'code'   => $data->get('code'),
            'name'     => $data->get('name'),                 
            'is_active'     => $data->get('isActive'),   
            'is_input'     => $data->get('isInput'),             
            'type'     => $data->get('type'),                  
            'modify_by'  => Auth::user()->name
        ]);

        return redirect()->route('reason')->with('status','Cập nhật thành công !!!');
        
    })->name('reasonpost');
    

/*****************************************************************************************/

Route::get('/new/input', function () {
    return view('new.input',['datas'=>\App\Models\apinvoice::where('type','=','NEW')->get()]);
})->name('newinput');

Route::get('/new/inputadd', function () {
    return view('new.inputadd');
})->name('newinputadd');

Route::post('/new/inputadd', function (Request $data) {
    if($data->get('code')!="")
    if(\App\Models\apinvoice::where('code','=',$data->get('code'))->get()->count()==1)
    return redirect()->route('apinvoice')->with('status', 'Đã tồn tại!');

    $ap = \App\Models\apinvoice::create([
        'code'=>$data->get('code'),
        'customer_id'=>$data->get('customer'),
        'customer_name'=>\App\Models\customer::find($data->get('customer'))->name,
        'user_id'=>$data->get('user'),
        'user_name'=>\App\Models\user::find($data->get('user'))->name,
        'user_note'=>$data->get('note'),
        'reason_id'=>$data->get('reason'),
        'reason_name'=>\App\Models\reason::find($data->get('reason'))->name,
        'currency'=>$data->get('currency'),
        'type'=>$data->get('type'),
        'date'=>$data->get('date'),
        'modify_by'  => Auth::user()->name
    ]);

    foreach($data->item as $value)
    {
        $apline=\App\Models\apinvoiceline::create([

            'seri' => $value['seri'],
            'item_id'=>$value['id'],
            'item_name'=>\App\Models\item::find($value['id'])->name,

            'price'=>$value['price'],
            'currency'=>$ap->currency,

            'reason_id'=>$ap->reason_id,
            'reason_name'=>$ap->reason_name,
            'type'=>$ap->type,

            'apinvoice_id'=>$ap->id,
            'apinvoice_code'=>$ap->code,

            'user_id'=>$ap->user_id,
            'user_name'=>$ap->user_name,

            'customer_id'=>$ap->customer_id,
            'customer_name'=>$ap->customer_name,

            'date'=>$ap->date,
            'modify_by'  => Auth::user()->name
        ]);
    }

    return redirect()->route('newinput')->with('status','Cập nhật thành công !!!');

})->name('newinputpostadd');

Route::get('/new/inputedit/{id}', function ($id) {
    return view('new.inputedit',['data'=>\App\Models\apinvoice::findOrFail($id)]); 
})->name('newinputedit');
Route::post('/new/inputedit', function (Request $data) {
     foreach($data->item as $key => $value)
     {
        $apline=\App\Models\apinvoiceline::find($value['id'])->update(['seri' => $value['seri'], 'price' => $value['price'],'modify_by' => Auth::user()->name]);
     } 
     return redirect()->route('newinput')->with('status','Cập nhật thành công !!!');
})->name('newinputpostedit');


/*****************************************************************************************/

Route::get('/new/output', function () {
    return view('new.output',['datas'=>\App\Models\arinvoice::where('type','=','NEW')->get()]);
})->name('newoutput');

Route::get('/new/outputadd', function () {
    return view('new.outputadd');
})->name('newoutputadd');

Route::post('/new/outputadd', function (Request $data) {
    if($data->get('code')!="")
    if(\App\Models\arinvoice::where('code','=',$data->get('code'))->get()->count()==1)
    return redirect()->route('arinvoice')->with('status', 'Đã tồn tại!');

    $ap = \App\Models\arinvoice::create([
        'code'=>$data->get('code'),
        'customer_id'=>$data->get('customer'),
        'customer_name'=>\App\Models\customer::find($data->get('customer'))->name,
        'user_id'=>$data->get('user'),
        'user_name'=>\App\Models\user::find($data->get('user'))->name,
        'user_note'=>$data->get('note'),
        'reason_id'=>$data->get('reason'),
        'reason_name'=>\App\Models\reason::find($data->get('reason'))->name,
        'currency'=>$data->get('currency'),
        'type'=>$data->get('type'),
        'date'=>$data->get('date'),
        'modify_by'  => Auth::user()->name
    ]);

    foreach($data->item as $value)
    {
            
        $arline=\App\Models\arinvoiceline::create([
            'guar_end' => $value['date']??'',

            'seri' => $value['seri'],
            'item_id'=>$value['id'],
            'item_name'=>\App\Models\item::find($value['id'])->name,

            'price'=>$value['price'],
            'currency'=>$ap->currency,

            'reason_id'=>$ap->reason_id,
            'reason_name'=>$ap->reason_name,
            'type'=>$ap->type,

            'arinvoice_id'=>$ap->id,
            'arinvoice_code'=>$ap->code,

            'user_id'=>$ap->user_id,
            'user_name'=>$ap->user_name,

            'customer_id'=>$ap->customer_id,
            'customer_name'=>$ap->customer_name,

            'date'=>$ap->date,
            'modify_by'  => Auth::user()->name
        ]);

        \App\Models\apinvoiceline::where('seri','=',$arline->seri)->where('is_open','=',1)->update(['is_open' => 0,'arline_id'=>$arline->id]);
    }

    return redirect()->route('newoutput')->with('status','Cập nhật thành công !!!');
})->name('newoutputpostadd');

Route::get('/new/outputedit/{id}', function ($id) {
    return view('new.outputedit',['data'=>\App\Models\arinvoice::findOrFail($id)]); 
})->name('newoutputedit');


Route::get('/new/seri', function () {
    return view('new.seri',['datas'=>\App\Models\apinvoiceline::where('type','NEW')->get()]); 
})->name('newseri');



/*****************************************************************************************/

Route::get('/used/input', function () {
    return view('used.input',['datas'=>\App\Models\apinvoice::where('type','=','USED')->get()]);
})->name('usedinput');

Route::get('/used/inputadd', function () {
    return view('used.inputadd');
})->name('usedinputadd');

Route::get('/used/inputedit/{id}', function ($id) {
    return view('used.inputedit',['data'=>\App\Models\apinvoice::findOrFail($id)]); 
})->name('usedinputedit');



/*****************************************************************************************/

Route::get('/used/output', function () {
    return view('used.output',['datas'=>\App\Models\arinvoice::where('type','=','USED')->get()]);
})->name('usedoutput');

Route::get('/used/outputadd', function () {
    return view('used.outputadd');
})->name('usedoutputadd');


Route::get('/used/outputedit/{id}', function ($id) {
    return view('used.outputedit',['data'=>\App\Models\arinvoice::findOrFail($id)]); 
})->name('usedoutputedit');


/*****************************************************************************************/

Route::get('/defective/input', function () {
    return view('defective.input',['datas'=>\App\Models\apinvoice::where('type','=','DEFECTIVE')->get()]);
})->name('defectiveinput');

Route::get('/defective/inputadd', function () {
    return view('defective.inputadd');
})->name('defectiveinputadd');

Route::get('/defective/inputedit/{id}', function ($id) {
    return view('defective.inputedit',['data'=>\App\Models\apinvoice::findOrFail($id)]); 
})->name('defectiveinputedit');



/*****************************************************************************************/

Route::get('/defective/output', function () {
    return view('defective.output',['datas'=>\App\Models\arinvoice::where('type','=','DEFECTIVE')->get()]);
})->name('defectiveoutput');

Route::get('/defective/outputadd', function () {
    return view('defective.outputadd');
})->name('defectiveoutputadd');


Route::get('/defective/outputedit/{id}', function ($id) {
    return view('defective.outputedit',['data'=>\App\Models\arinvoice::findOrFail($id)]); 
})->name('defectiveoutputedit');



 });

});