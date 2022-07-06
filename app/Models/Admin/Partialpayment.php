<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\Payment;

class Partialpayment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Payment()
    {
        return $this->belongsTo(Payment::class);
    }

}
