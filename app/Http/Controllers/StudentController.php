<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{


    public function index(){
        $students = Student::all();
        return view('student.index',['students'=>$students]);
    }

    public function create(){
        return view('student.create');
    }

    public function store(Request $req){

        $student = new Student();
        $student->name = $req->name;
        $student->gender = $req->gender;
        $student->class = $req->class;
        $student->address = $req->address;
        $student->phone = $req->phone;
        $student->email = $req->email;
        $student->save();
       // $req->validated();
        session()->flash("success","Student Created Successfully ");

        return redirect()->route('students.create');
    }

    public function edit($id){
        $student = Student::find($id);
        return view('student.edit',['student'=>$student]);
    }

    public function update(Request $request, $id)
    {

        $student = Student::find($id);
        $student->name = $request->name;
        $student->address = $request->address;
        $student->gender = $request->gender;
        $student->class = $request->class;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->save();
        session()->flash("success","Student Updated Successfully ");
        return redirect()->route('students');
    }

    public function delete($id){
        Student::find($id)->delete();
        session()->flash("success","Student Deleted Successfully ");
        return redirect()->route('students');
    }
}
