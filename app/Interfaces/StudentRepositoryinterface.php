<?php

namespace App\Interfaces;
use Illuminate\Http\Request;
interface StudentRepositoryinterface
{
    public function getAllStudent();
    public function getStudentById($studentId);
    public function deleteStudent($studentId);
    public function createStudentInfo(Request $request);
    public function updateStudentInfo(Request $request, $id);
}

?>