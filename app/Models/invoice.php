<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
     use HasFactory;
    
  
    protected $fillable = ['invoice_number','invoiced_by','client_id','sub_total','total','due_date','vat','inc_vat','credit','status'];


     public function client(){
     	return $this->belongsTo(Client::class);
     }

     public function services (){
     	return $this->belongsToMany(Service::class);
     }

     public function user (){
        return $this->belongsTo(User::class);
     }
}
