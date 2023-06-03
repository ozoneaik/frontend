<?php

namespace App\Http\Controllers;

use App\Models\LeaveForm;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilterController extends Controller
{
    //
    public function filter(Request $request){
//        dd($request->all());
        if ($request->start && $request->end){
            $start = Carbon::createFromFormat('d/m/Y H:i', $request->start)->format('Y-m-d H:i:s');
            $end = Carbon::createFromFormat('d/m/Y H:i', $request->end)->format('Y-m-d H:i:s');
//            dd($start,$end);

            $leaves = LeaveForm::where('user_id', Auth::user()->id)
                ->whereBetween('leave_start', [$start, $end])
                ->get();
            $users = User::all();

//            dd($start,$end,$leaves->all(),$start);
            return view('req_list',compact('leaves','users','start','end'));

        }else{
            return redirect()->route('req');
        }
    }
}
