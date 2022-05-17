<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public function medicins() {
        return $this->hasMany(Medicin::class , 'invoice_id' , 'id');
    }

    public function patients() {
        return $this->hasMany(Patient::class , 'invoice_id' , 'id');
    }

    public function employees() {
        return $this->hasMany(Employee::class , 'invoice_id' , 'id');
    }
}
