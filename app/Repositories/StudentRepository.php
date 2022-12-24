<?php
namespace App\Repositories;

use App\Interfaces\StudentRepositoryinterface;
use App\Models\Student;
use Illuminate\Http\Request;
class StudentRepository implements StudentRepositoryinterface
{
    public function getAllStudent()
    {
        return Student::orderBy('id', 'desc')->get();
    }

    public function getStudentById($studentId)
    {
        $students = Student::findOrfail($studentId);
        return $students;
    }

    public function deleteStudent($id)
    {
        $student = Student::findOrfail($id);
        $student->delete();
        return $student;
    }

    public function createStudentInfo(Request $request)
    {
        $student = new Student();

        $student->student_id    = studentIDgenerator(new Student, 'student_id', 5, 'STD');
        $student->student_name  = $request->student_name;
        $student->student_status  = $request->student_status;
        $student->save();
        return $student;
    }

    public function updateStudentInfo(Request $request, $id)
    {
      
        $student = Student::findOrfail( $id);

        $student->student_name  = $request->student_name;
        $student->student_status  = $request->student_status;
        $student->update();
        return $student;
    }
}



?>

