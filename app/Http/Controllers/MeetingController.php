<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Meeting;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get meetings
        $meetings = Meeting::with('teacher','department')->get();
        //dd($meetings);

        return view('meeting.list', compact('meetings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //add record
        $teachers = Teacher::where('status', 'active')->get();
        $departments = Department::where('status', 'active')->get();
        return view('meeting.add', compact('teachers', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store meetings data
        $validation = Validator::make($request->all(), $this->rules(), $this->messages());
        if ($validation->fails()) {
            return redirect('meetings/create')
                ->withErrors($validation)
                ->withInput();
        }
        $store = Meeting::create($request->all());
        return redirect('');
    }

    protected function rules()
    {
        return [
            'subject_name' => 'required',
            'credit_hours' => 'required|numeric',
            'teacher_id' => 'required|numeric',
            'department_id' => 'required|numeric',
            'meeting_title' => 'required',
            'agenda' => 'required',
        ];
    }

    protected function messages()
    {
        return [
            'required' => 'The :attribute can not be blank.',
            'numeric' => 'The :attribute should be numeric.'
        ];
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function show(Meeting $meeting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function edit(Meeting $meeting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meeting $meeting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meeting $meeting)
    {
        //
    }
}
