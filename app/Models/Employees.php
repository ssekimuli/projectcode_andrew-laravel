<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table="Employees";
    protected $fillable = [
    'firstname','lastname','company_id','email','phone',
    ];

    public function company(){

        return $this->belongsTo(Companies::class);
    }
}
