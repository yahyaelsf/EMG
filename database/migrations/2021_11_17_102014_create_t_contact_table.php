<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_contact', function (Blueprint $table) {
            $table->increments('pk_i_id');
            $table->integer('fk_i_user_id')->nullable();
            $table->string('s_name',255);
            $table->string('s_title', 255)->nullable();
            $table->string('s_email', 255);
            $table->string('s_mobile', 255)->nullable();
            $table->string('s_address', 255)->nullable();
            $table->text('s_content')->nullable();
            $table->integer('b_seen')->default(0);
            $table->enum('e_type', ['CONTACT', 'COMPLAINT', 'SUGGESTION'])->nullable();
            $table->timestamp('dt_created_date')->nullable();
            $table->timestamp('dt_modified_date')->nullable();
            $table->timestamp('dt_deleted_date')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_contact');
    }
}
