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
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id'); // Adiciona um índice primário à coluna 'id'
            $table->string('name');
            $table->integer('company_size')->nullable();
            $table->string('website')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('street_adress')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('email1')->nullable();
            $table->string('email2')->nullable();
            $table->string('temporary_email')->nullable();
            $table->string('fax')->nullable();
            $table->string('fone1')->nullable();
            $table->string('fone2')->nullable();
            $table->string('other')->nullable();
            $table->boolean('status_active')->default(true);
            $table->decimal('storage_limit', 10,2)->nullable();
            $table->string('avatar_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
