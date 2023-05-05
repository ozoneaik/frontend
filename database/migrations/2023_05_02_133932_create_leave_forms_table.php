<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leave_forms', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('leave_type')->nullable();
            $table->timestamp('leave_start')->nullable();
            $table->timestamp('leave_end')->nullable();
            $table->string('leave_total')->default('0 วัน 0 ชั่วโมง 0 นาที')->nullable();
            $table->string('reason')->nullable();
            $table->string('file1')->nullable();
            $table->string('file2')->nullable();
            $table->string('sel_rep')->nullable();
            $table->string('approve_rep')->nullable()->default('⌛')->comment('อนุมัติโดย rep');//✔️❌⌛
            $table->string('sel_pm')->nullable();
            $table->string('case_no_rep')->nullable()->comment('กรณีไม่มีผู้ปฏิบัติงานแทน');
            $table->string('approve_pm')->nullable()->default('⌛')->comment('อนุมัติโดย pm');
            $table->string('approve_hr')->nullable()->default('⌛')->comment('อนุมัติโดย hr');
            $table->string('sel_ceo')->nullable();
            $table->string('approve_ceo')->nullable()->default('⌛')->comment('อนุมัติโดย ceo');
            $table->string('status')->default('approve');
            $table->timestamps();
        });
        $now = Carbon::now();
        DB::table('leave_forms')->update([
        'created_at' => $now,
        'updated_at' => $now,
    ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_forms');
    }
};
