<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ChangeETypeColumnInTContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_contact', function (Blueprint $table) {
            DB::statement("ALTER TABLE t_contact MODIFY e_type ENUM('CONTACT', 'COMPLAINT', 'SUGGESTION', 'ANOTHER') NULL");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_contact', function (Blueprint $table) {
            DB::statement("ALTER TABLE t_contact MODIFY e_type ENUM('CONTACT', 'COMPLAINT', 'SUGGESTION') NULL");
        });
    }
}
