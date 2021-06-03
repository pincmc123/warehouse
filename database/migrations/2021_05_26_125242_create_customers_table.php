<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {

            $table->id();

            $table->string('code',20)->unique();

            $table->string('name');
            
            $table->string('contact')->nullable();

            $table->string('phone')->nullable();

            $table->string('email')->nullable();

            $table->string('address')->nullable();

            $table->boolean('is_active')->default(1);

            $table->string('modify_by')->nullable();

            $table->text('note')->nullable();

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
        Schema::dropIfExists('customers');
    }
}
