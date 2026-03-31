<?php

namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Rol extends Model {
    protected $table = "rol";
    protected $primaryKey = "id";
}