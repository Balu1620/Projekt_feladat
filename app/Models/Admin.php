<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    /** @use HasFactory<\Database\Factories\AdminFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "name",
        "email",
        "password",
        "jobStatus",
    ];
    public function logs()
    {
        return $this->hasMany(Log::class)->withTrashed();
    }
}
