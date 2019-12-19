<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Student;
use App\Model\Course;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users         = User::where('status',1)->get();
        $teachers      = User::where([['role_id',4],['status',1]])->get();
        $students      = Student::where('status',1)->get();
        $courses       = Course::all();
        return view('admin.index', compact('users', 'teachers', 'students', 'courses'));
    }

    public function chartMurid()
    {
        $lk   = Student::where('status', 1)->where('gender','=','L')->count();
        $pr   = Student::where('status', 1)->where('gender','=','P')->count();
        $gender = [$lk, $pr];
        return response()->json($gender);
    }

    public function chartGuru()
    {
        $lk   = User::where([['role_id',4],['status', 1]])->where('gender','=','L')->count();
        $pr   = User::where([['role_id',4],['status', 1]])->where('gender','=','P')->count();
        $gender = [$lk, $pr];
        return response()->json($gender);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
