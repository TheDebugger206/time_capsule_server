<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Attachment extends Model
{
    use HasFactory;

    public function capsule()  {
        return $this->belongsTo(Capsule::class);
    }

    
}
