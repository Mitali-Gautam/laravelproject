<?php
namespace App\Repositories;

use App\Interfaces\StudentRepositoryInterface;
use App\Models\Student;

class StudentRepository implements StudentRepositoryInterface{
    public function __construct(Student $student) {
        $this->student = $student;
    }

    public function getAllStudents() {
        return $this->student->get();
    }

    public function getStudentById($studentId)  {
        return $this->student->find($studentId);
    }

    public function deleteStudent($studentId) {
        $student = $this->student->find($studentId);
        return $student->delete();
    }

    public function storeStudent(array $studentDetails) {
        return $this->student->create($studentDetails);
    }

    public function updateStudent($studentId,array $newDetails) {
        $student = $this->student->find($studentId);
        $student->name = $newDetails['name'];
        $student->address = $newDetails['address'];
        $student->gender = $newDetails['gender'];
        $student->class = $newDetails['class'];
        $student->phone = $newDetails['phone'];
        $student->email = $newDetails['email'];
        $student->save();

    }
}
