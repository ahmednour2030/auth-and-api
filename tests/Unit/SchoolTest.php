<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class SchoolTest extends TestCase
{
    /** @test  */
    public function schools_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('schools', [
                'name', 'address', 'phone'
            ]), 1);
    }
}
