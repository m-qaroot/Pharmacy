<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicin extends Model
{
    use HasFactory;

    public function employee() {
        return $this->belongsTo(Employee::class);
    }

    public function invoice() {
        return $this->belongsTo(Invoice::class);
    }
}
