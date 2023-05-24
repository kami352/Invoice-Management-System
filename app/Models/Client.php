<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','company_name','phone_number','tin_number','address'];
    public function invoice(){
    	return $this->hasMany(invoice::class);
    }
}
