<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('capsules', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->string("title");
            $table->text("message");
            $table->date("reveal_date");
            $table->boolean("is_revealed")->index();
            $table->boolean("privacy")->index();
            $table->string("mood")->index();
            // ip address related data
            $table->string("ip");
            $table->string("country_name")->nullable();
            $table->string("country_code")->nullable();
            $table->string("region_code")->nullable();
            $table->string("region_name")->nullable();
            $table->string("city_name")->nullable();
            $table->string("zip_code")->nullable();
            $table->string("latitude")->nullable();
            $table->string("longitude")->nullable();
            $table->string("timezone")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capsules');
    }
};
