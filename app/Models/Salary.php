<?php

namespace App\Models;
use App\Models\User;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'salary'
    ];

    public function user(){
        $this->belongsTO(User::class);
    }
}
