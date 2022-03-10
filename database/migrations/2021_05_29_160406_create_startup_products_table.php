<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartupProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('startup_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('product_name');
            $table->text('description');
            $table->foreignId('focus_sectors_id')->nullable()->constrained('focus_sectors')->cascadeOnUpdate()->nullOnDelete(); //•	What is your solution/ Product Sector
            $table->string('address');
            $table->string('postal_code');
            $table->string('web_url')->nullable();
            $table->string('business_model');
            $table->text('business_model_desc');
            $table->string('finacial_stage');
            $table->string('product_stage');
            $table->string('product_cat'); //Incubator(Pre Mature) or Acceleretor (Matured)
            $table->boolean('hasStakeholder')->default(false);
            $table->string('stakeholder_name')->nullable();
            $table->foreignId('stake_holders_details_id')->nullable()->constrained('stake_holders_details')->cascadeOnUpdate()->nullOnDelete();
            $table->string('ownership');
            $table->boolean('isRegistered')->default(false); // status
            $table->boolean('isApproved')->default(false); // status
            $table->boolean('isStakeHolderApproved')->default(false); // status
            $table->string('est_year')->nullable();
            $table->string('file_name')->nullable();
            $table->string('status')->nullable();
            $table->string('number_of_staffs')->nullable();
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
        Schema::dropIfExists('startup_products');
    }
}
