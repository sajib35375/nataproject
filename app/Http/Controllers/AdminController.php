<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Asession;
use App\Models\Course;
use App\Models\Dormatory;
use App\Models\Droom;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::DASH;



    public function loginPage(){
        return view('admin.login');
    }

    public function AdminDashboard(){
        $total_participant = Apply::all()->count();
        $total_course = Course::all()->count();
        $total_batch = Asession::all()->count();
        $total_certified = Apply::where('status',true)->count();
        $total_dormatory = Dormatory::all()->count();
        $total_room = Droom::all()->count();
        return view('admin.index',compact('total_participant','total_room','total_course','total_batch','total_certified','total_dormatory'));
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('admin.login');
    }




}
