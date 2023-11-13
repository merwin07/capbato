<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    protected $table = 'data'; // Set the table name

    protected $fillable = [
        'time'
        // Add other columns as needed
    ];
}
