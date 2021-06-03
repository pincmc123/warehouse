<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApinvoicelinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apinvoicelines', function (Blueprint $table) {
            $table->id();

            
            $table->string('seri',20)->nullable();

            $table->unsignedBigInteger('item_id');
            $table->string('item_name')->nullable();
         
            $table->unsignedBigInteger('price')->nullable();
            $table->string('currency')->nullable();

            $table->unsignedBigInteger('reason_id');        
            $table->string('reason_name');
            $table->string('type',20);//NEW USED DEFECTIVE

            $table->boolean('is_open')->default(1);//Xuất kho
            $table->boolean('is_delete')->nullable();//Hủy


            $table->unsignedBigInteger('apinvoice_id')->nullable();
            $table->string('apinvoice_code',20)->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('user_name')->nullable();//

            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('customer_name')->nullable();//

            $table->date('date')->nullable();

            $table->string('modify_by')->nullable();


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
        Schema::dropIfExists('apinvoicelines');
    }
}
