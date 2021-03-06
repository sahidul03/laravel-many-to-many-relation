<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Country;
use App\Models\District;
use Illuminate\Http\Request;

use App\Http\Requests;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countires = Country::pluck('name', 'id')->toArray();
        return view('student.create', compact('countires'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'roll' => 'required'
        ]);

        Student::create($request->all());
        return redirect()->route('student.index')
            ->with('success','Student created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id)
            ->with('country')
            ->with('district')
            ->with('thana')
            ->with('courses')
            ->first();
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.edit',compact('student'));
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
        $this->validate($request, [
            'name' => 'required',
            'roll' => 'required'
        ]);

        Student::find($id)->update($request->all());
        return redirect()->route('student.index')
            ->with('success','Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::find($id)->delete();
        return redirect()->route('student.index')
            ->with('success','Student deleted successfully');
    }

    public function getDistricts($country_id)
    {
        $country = Country::find($country_id);
        return $country->districts()->pluck('name', 'id');
    }


    public function getThanas($district_id)
    {
        $district = District::find($district_id);
        return $district->thanas()->pluck('name', 'id');
    }
}
