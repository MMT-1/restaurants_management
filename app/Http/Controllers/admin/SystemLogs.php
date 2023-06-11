<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\admin\SystemLog;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
use DataTables;

class SystemLogs extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    } 

    public function index(Request $request)
    {            $list = Activity::all();

        if ($request->ajax()) {
    

            return DataTables::of($list)
            ->addColumn('DT_RowIndex', function ($row) {
                return $row->id;
            })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('Y-m-d H:i:s');
                })
                ->make(true);
        }
    
        return view('admin.systemLogs');
    }
    
     
           
   
    public function clear(Request $request)
    {
        // Clear all activity logs
        Activity::truncate();

        // Redirect back or to any desired page
        return redirect()->back()->with('success', 'Activity logs cleared successfully');
    }

    }