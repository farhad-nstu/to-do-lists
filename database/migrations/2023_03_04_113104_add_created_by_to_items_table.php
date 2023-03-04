<?php

use App\Models\Item;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table(with(new Item())->getTable(), function (Blueprint $table) {
            $table->integer('created_by')->nullable();
        });
    }

    public function down()
    {
        Schema::table(with(new Item())->getTable(), function (Blueprint $table) {
            $table->dropColumn('created_by');
        });
    }
};
