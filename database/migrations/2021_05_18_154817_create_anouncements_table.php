<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anouncements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image_file')->nullable();
            $table->string('attachment')->nullable();
            $table->mediumText('content');
            $table->double('amount')->default(0);
            $table->boolean('isPaid')->default(false);
            $table->boolean('isActive')->default(true);
            $table->string('expr_date');
            $table->string('target_to');
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
        Schema::dropIfExists('anouncements');
    }
}
