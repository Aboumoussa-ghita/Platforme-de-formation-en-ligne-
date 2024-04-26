<?php

namespace App\Http\Controllers;
namespace App\Models;

use App\Models\chapitre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\formateur;


class exercice extends Model
{
    protected $table='exercices';
    public $timestamps = false;
}