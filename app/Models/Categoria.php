<?php
namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Categoria  extends Model {
    protected $table = "categoria";
    protected $primaryKey = "CATEGO_ID";
    
}