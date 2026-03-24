<?php
namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Adjuntos extends Model {
    protected $table = "documento_adjunto";
    protected $primaryKey = "ADJUNTO";
    
}