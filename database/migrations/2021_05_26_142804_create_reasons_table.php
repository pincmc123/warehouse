<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reasons', function (Blueprint $table) {
            $table->id();

            $table->string('code',20)->unique();
            $table->string('name');
            $table->boolean('is_input');//INPUT OUTPUT
            $table->string('type',20);//NEW USED DEFECTIVE
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
        Schema::dropIfExists('reasons');
    }
}
