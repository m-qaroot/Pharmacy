<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function user(){
        return $this->morphOne(User::class , 'actor' , 'actor_type' , 'actor_id' , 'id');
    }

    public function suppliers() {
        return $this->hasMany(Supplier::class , 'employee_id' , 'id');
    }

    public function medicins() {
        return $this->hasMany(Medicin::class , 'employee_id' , 'id');
    }

    public function invoice() {
        return $this->belongsTo(Invoice::class);
    }
}
