<?php

namespace App\Enums\Employee;

use App\Support\Enum;

enum EmployeeRoles: int
{
    use Enum;

    case Member = 1;
    case Manager = 2;
}
