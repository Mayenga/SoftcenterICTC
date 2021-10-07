<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStakeHoldersDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stake_holders_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('org_name'); 
            $table->string('parent_name'); 
            $table->string('est_year');
            $table->boolean('isRegistered')->default(false);
            $table->string('number_of_staffs');
            $table->string('address');
            $table->string('postal_code');
            $table->integer('max_startup');
            $table->string('pref_startup_stage'); //select
            $table->mediumText('source_funds');
            $table->string('focus_sectors_id');
            // $table->foreignId('focus_sectors_id')->nullable()->constrained('focus_sectors')->onUpdate('cascade')->onDelete('set null'); //•	What is your solution/ Product Sector
            $table->string('service_provided');
            $table->string('program_duration');
            $table->string('business_model'); //select
            $table->mediumText('business_model_desc'); 
            $table->boolean('isApproved')->default(false); //
            $table->string('status')->nullable(); //
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
        Schema::dropIfExists('stake_holders_details');
    }
}
