<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Student;

class StudentController extends Controller {
    public function index() {
        return StudentResource::collection(Student::paginate(10));
    }
}
