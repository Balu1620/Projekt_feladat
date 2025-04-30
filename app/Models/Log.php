<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    /** @use HasFactory<\Database\Factories\LogFactory> */
    use HasFactory;
    use SoftDeletes;

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
