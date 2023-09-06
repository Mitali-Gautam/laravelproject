<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Interfaces\StudentRepositoryInterface;

class StudentController extends Controller
{
    private StudentRepositoryInterface $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository) {
        $this->studentRepository = $studentRepository;
    }

    public function index() {
        $students = $this->studentRepository->getAllStudents();
        return view('student.index',['students'=>$students]);
    }

    public function create() {
        return view('student.create');
    }

    public function store(Request $req) {

        $data = array(
            'name' => $req->name,
            'gender' => $req->gender,
            'class' => $req->class,
            'address' => $req->address,
            'phone' => $req->phone,
            'email' => $req->email,
        );

        $this->studentRepository->storeStudent($data);
       // $req->validated();
        session()->flash("success","Student Created Successfully ");
        return redirect()->route('students.create');
    }

    public function edit($id) {
        $student =  $this->studentRepository->getStudentById($id);
        return view('student.edit',['student'=>$student]);
    }

    public function update(Request $req, $id) {
        $data = array(
            'name' => $req->name,
            'gender' => $req->gender,
            'class' => $req->class,
            'address' => $req->address,
            'phone' => $req->phone,
            'email' => $req->email,
        );
        $this->studentRepository->updateStudent($id,$data);
        session()->flash("success","Student Updated Successfully ");
        return redirect()->route('students');
    }

    public function delete($id) {
        $student = $this->studentRepository->deleteStudent($id);
        session()->flash("success","Student Deleted Successfully ");
        return redirect()->route('students');
    }

    public function view($id){
        $student= $this->student->find($id);
        return view('student.view',['student'=>$student]);
    }
}
