<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    use HasFactory;

    protected $fillable = [
        'studentid',
        'isPresent',
        'comments',
        'class_id',
        'date_marked_for',
    ];
}
