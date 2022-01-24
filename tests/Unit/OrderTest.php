<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class OrderTest extends TestCase
{

    /** @test  */
    public function orders_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('orders', [
                'title', 'description', 'student_id', 'school_id',
            ]), 1);
    }
}
