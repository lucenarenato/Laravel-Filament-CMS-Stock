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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('organization_id')->nullable(); // unsigned integer para combinar com a coluna 'id' da tabela 'organizations'
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->integer('permission')->after('id')->default(0);
            $table->bigInteger('organization_id_logged')->after('permission')->default(0);
            $table->boolean('islocked')->after('organization_id_logged')->default(false)->nullable();
            $table->dateTime('lock_date')->after('islocked')->nullable();
            $table->integer('attempts')->after('lock_date')->default(0)->nullable();
            $table->timestamp('last_access')->after('attempts')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['organization_id']); // Adicionar a remoção da chave estrangeira
            $table->dropColumn('organization_id');
            $table->dropColumn('permission');
            $table->dropColumn('organization_id_logged');
            $table->dropColumn('islocked');
            $table->dropColumn('lock_date');
            $table->dropColumn('attempts');
            $table->dropColumn('last_access');
        });
    }
};


