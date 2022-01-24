<?php

namespace App\Repository\Contracts;

interface StudentInterface
{
    /**
     * @param int $limit
     * @return mixed
     */
    public function getStudents(int $limit);
}
