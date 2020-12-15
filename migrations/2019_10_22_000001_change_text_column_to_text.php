<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use OptimistDigital\NovaNotesField\NotesFieldServiceProvider;

class ChangeTextColumnToText extends Migration
{
    public function up()
    {
        Schema::table(NotesFieldServiceProvider::getTableName(), function (Blueprint $table) {
            $table->text('text')->change();
        });
    }

    public function down()
    {
        Schema::table(NotesFieldServiceProvider::getTableName(), function (Blueprint $table) {
            $table->string('text')->change();
        });
    }
}
