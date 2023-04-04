<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plan_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plan_name');
            $table->integer('user_id');
            $table->integer('company_id')->nullable();
            $table->text('plan_description')->nullable();
            $table->integer('price')->nullable();
            $table->timestamps();
        });
    }

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_profiles');
    }
};
