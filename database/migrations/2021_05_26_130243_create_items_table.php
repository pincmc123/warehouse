<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            
            $table->id();

            $table->string('code',20)->unique();//Mã sản phẩm

            $table->string('name');//Tên sản phẩm

            $table->boolean('is_seri')->default(1);

            $table->unsignedBigInteger('price')->nullable();

            $table->boolean('is_active')->default(1);

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
        Schema::dropIfExists('items');
    }
}
