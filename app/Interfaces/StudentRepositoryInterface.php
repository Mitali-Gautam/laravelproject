<?php

namespace App\Interfaces;

interface StudentRepositoryInterface{
    public function getAllStudents();
    public function getStudentById($studentId);
    public function deleteStudent($studentId);
    public function storeStudent(array $studentDetails);
    public function updateStudent($studentId, array $newDetails);
}
