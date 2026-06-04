<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('lowongans', function (Blueprint $table) {
            $table->foreignId('team_id')
                ->nullable()
                ->after('industri_id')
                ->constrained()
                ->nullOnDelete();
        });

        DB::table('lowongans')
            ->join('teams', 'teams.name', '=', 'lowongans.divisi')
            ->whereNull('lowongans.team_id')
            ->update(['lowongans.team_id' => DB::raw('teams.id')]);
    }

    public function down(): void
    {
        Schema::table('lowongans', function (Blueprint $table) {
            $table->dropForeign(['team_id']);
            $table->dropColumn('team_id');
        });
    }
};