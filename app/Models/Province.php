<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    
    public $timestamps = true;
    protected $table = 'province';
    protected $fillable = ['province_id', 'province'];



}
