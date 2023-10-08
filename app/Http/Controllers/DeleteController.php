<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LeaveForm;
use App\Models\users_leave_data;

class DeleteController extends Controller
{
    public function destroy($id)
    {
        $Users = User::find($id);

        if ($Users) {
            $Users->delete();
            return redirect()->route('data.users')->with('success', 'การลบบัญชีผู้ใช้สำเร็จ');
        } else {
            return redirect()->route('data.users')->with('error', 'การลบบัญชีผู้ใช้มีข้อผิดพลาด');
        }
    }
    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        $user->restore();

        return redirect()->route('data.users')->with('success', 'User restored successfully.');
    }

    public function recovery()
    {
        $softDeletedUsers = User::onlyTrashed()->get();
        return view('users.restore_user', compact('softDeletedUsers'));
    }

    public function hardDelete($id)
    {
        // Find the user
        $user = User::withTrashed()->findOrFail($id);

        if (!$user) {
            return redirect()->route('data.users')->with('error', 'User not found');
        }

        // Find and delete related leave_forms records
        LeaveForm::where('user_id', $id)->forceDelete();

        // Find and delete related users_leave_datas records
        users_leave_data::where('user_id', $id)->forceDelete();

        // Perform the hard delete on the user
        $user->forceDelete();

        return redirect()->route('data.users')->with('success', 'User and related records hard deleted successfully');
    }
}
