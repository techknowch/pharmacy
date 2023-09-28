<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('medicines', function (Blueprint $table) {
            $table->integer('boxes_qty')->default(0);
            $table->string('supplier_name')->nullable();
            $table->string('category')->nullable();
            $table->text('description')->nullable();
            $table->date('expiry_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medicines', function (Blueprint $table) {
            //
        });
    }
};
