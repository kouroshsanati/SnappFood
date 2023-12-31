<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressUser extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'address_user';

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}

;
