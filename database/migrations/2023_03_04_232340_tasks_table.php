<?php

use App\Models\Item;
use App\Models\Task;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(with (new Task())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->string('task_name');
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->foreign('item_id')->references('id')->on(with(new Item())->getTable())->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(with (new Task())->getTable());
    }
};
