<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTextColumnToText extends Migration
{
    public function up()
    {
        Schema::table('nova_notes', function (Blueprint $table) {
            $table->text('text')->change();
        });
    }

    public function down()
    {
        Schema::table('nova_notes', function (Blueprint $table) {
            $table->string('text')->change();
        });
    }
}
