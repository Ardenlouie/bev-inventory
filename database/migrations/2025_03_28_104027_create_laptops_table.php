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
        Schema::create('laptops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->nullable();
            $table->string('tag_id')->nullable();
            $table->foreignId('device_id')->nullable();
            $table->string('model')->nullable();
            $table->string('serial')->nullable();
            $table->foreignId('employee_id')->nullable();
            $table->foreignId('department_id')->nullable();
            $table->dateTime('date_acquired')->nullable();
            $table->string('age')->nullable();
            $table->string('status')->nullable();
            $table->string('specification')->nullable();
            $table->string('os')->nullable();
            $table->string('office')->nullable();
            $table->string('inclusions')->nullable();
            $table->dateTime('issued_date')->nullable();
            $table->string('note')->nullable();
            $table->string('previous_owner')->nullable();
            $table->decimal('amount')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptops');
    }
};
