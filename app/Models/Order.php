<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function form()
    {
        return $this->belongsTo(Form::class, 'form_id');
    }

}
