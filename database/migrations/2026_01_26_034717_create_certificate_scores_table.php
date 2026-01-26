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
        Schema::create('certificate_scores', function (Blueprint $table) {
            $table->id();

            $table->foreignId('certificate_id')
                ->constrained('certificates')
                ->cascadeOnDelete();

            $table->unsignedTinyInteger('discipline_attendance');
            $table->unsignedTinyInteger('responsibility');
            $table->unsignedTinyInteger('teamwork_communication');
            $table->unsignedTinyInteger('technical_skill');
            $table->unsignedTinyInteger('work_ethic');
            $table->unsignedTinyInteger('initiative_creativity');

            $table->unsignedTinyInteger('micro_skill');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_scores');
    }
};
