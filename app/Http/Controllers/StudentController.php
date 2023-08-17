<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentsRequest;


class StudentController extends Controller
{


    public function index(){
        return view('student.index');
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

    public function edit(){
        return view('student.edit');
    }
}
