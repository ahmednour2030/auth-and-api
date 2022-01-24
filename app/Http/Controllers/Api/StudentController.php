<?php

namespace App\Http\Controllers\Api;

use App\Repository\Contracts\StudentInterface;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    use ApiResponseTrait;

    /**
     * @var StudentInterface
     */
    private $studentInterface;

    /**
     * @param StudentInterface $studentInterface
     */
    public function __construct(StudentInterface $studentInterface)
    {
        $this->studentInterface = $studentInterface;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
         $students = $this->studentInterface->getStudents(20);

         return $this->apiResponse('successfully', $students);
    }
}
