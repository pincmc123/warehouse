<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApinvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apinvoices', function (Blueprint $table) {
            $table->id();

            
            $table->string('code',20)->nullable();//Người dùng nhập

            $table->unsignedBigInteger('customer_id')->nullable();//Người dùng nhập
            $table->string('customer_name')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();//Người dùng nhập
            $table->string('user_name')->nullable();
            $table->text('user_note')->nullable();

            $table->string('modify_by')->nullable();

            $table->unsignedBigInteger('total')->nullable();
            $table->string('currency')->nullable();//Người dùng nhập

            
            $table->unsignedBigInteger('reason_id');//Người dùng nhập        
            $table->string('reason_name');
    
            $table->string('type',20);//NEW USED DEFECTIVE //Người dùng nhập

            $table->date('date')->nullable();//Người dùng nhập

            $table->boolean('is_open')->default(1);//Có thể thay đổi

            $table->boolean('id_delete')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apinvoices');
    }
}
