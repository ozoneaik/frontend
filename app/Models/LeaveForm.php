<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveForm extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $fillable = [
       'name',
       'user_id',
       'leave_type',
       'leave_start',
       'leave_end',
       'reason',
       'file1',
       'file2',
       'sel_rep',
       'sel_pm',
       'approve_rep',
       'approve_pm',
       'approve_hr',
       'approve_ceo',
       'status',
       'case_no_rep',
   ];
}
