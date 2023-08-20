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
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('leave_type')->nullable();
            $table->timestamp('leave_start')->nullable();
            $table->timestamp('leave_end')->nullable();
            $table->string('leave_total')->default('0 วัน 0 ชั่วโมง 0 นาที')->nullable();
            $table->string('reason')->nullable();
            $table->string('file1')->nullable();
            $table->string('file2')->nullable();

            $table->unsignedBigInteger('sel_rep')->index()->nullable();
            $table->foreign('sel_rep')->references('id')->on('users');
            $table->string('approve_rep')->nullable()->default('in_progress')->comment('อนุมัติโดย rep');
            $table->string('case_no_rep')->nullable()->comment('กรณีไม่มีผู้ปฏิบัติงานแทน');

            $table->unsignedBigInteger('sel_pm')->index()->nullable();
            $table->foreign('sel_pm')->references('id')->on('users');
            $table->string('reason_pm')->nullable()->comment('ความเห็น PM');
            $table->string('allowed_pm')->nullable()->comment('อนุญาตตามสิทธิ์พนักงาน');
            $table->string('not_allowed_pm')->nullable()->comment('ไม่อนุญาติเนื่องจาก');
            $table->string('approve_pm')->nullable()->default('in_progress')->comment('อนุมัติโดย pm');

            $table->string('approve_hr')->nullable()->default('in_progress')->comment('อนุมัติโดย hr');
            $table->string('reason_hr')->nullable()->comment('ความเห็น HR');
            $table->string('not_allowed_hr')->nullable()->comment('ไม่อนุญาติเนื่องจาก');

            $table->string('approve_ceo')->nullable()->default('in_progress')->comment('อนุมัติโดย ceo');
            $table->string('reason_ceo')->nullable()->comment('ความเห็น CEO');
            $table->string('not_allowed_ceo')->nullable()->comment('ไม่อนุญาติเนื่องจาก');

            $table->string('status')->default('กำลังดำเนินการ');
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
