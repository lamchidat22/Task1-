<?php

namespace App\Models;

use App\Enums\Employee\EmployeeRoles;
use App\Enums\Employee\EmployeeGender;
use Illuminate\Database\Eloquent\Model;


class Employee extends Model{
    public $timestamps = false;
    protected $fillable = [
        'username',
        'email',
        'password',
        'gender',
        'role',
        'date'
    ];

    protected $casts = [
        'role' => EmployeeRoles::class,
        'gender' => EmployeeGender::class,
        'date' => 'date'
    ];
}
?>
