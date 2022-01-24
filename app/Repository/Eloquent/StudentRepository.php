<?php

namespace App\Repository\Eloquent;

use App\Repository\Contracts\StudentInterface;
use App\Models\Student;

class StudentRepository  implements StudentInterface
{
    /**
     * @var Student
     */
    protected $studentModel;

    /**
     * @param Student $student
     */
    public function __construct(Student $student)
    {
        $this->studentModel  = $student;
    }

    /**
     * @param int $limit
     * @return mixed
     */
    public function getStudents(int $limit = 10)
    {
        return
            $this->studentModel
                ->orderBy('created_at','desc')
                ->paginate($limit);
    }
}
