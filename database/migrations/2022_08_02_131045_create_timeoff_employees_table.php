<?php

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
        Schema::create('timeoff_employees', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('organization_id')->references('id')->on('organizations');
            $table->foreignUuid('timeoff_id')->references('id')->on('timeoffs');
            $table->foreignUuid('employee_id')->references('id')->on('employees');

            $table->date('date_start');
            $table->date('date_end');
            $table->text('note');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timeoff_employees');
    }
};
