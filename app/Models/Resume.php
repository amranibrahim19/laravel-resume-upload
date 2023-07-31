<?php

namespace App\Models;

use App\Models\Access\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resume extends Model
{
    protected $table = 'resumes';

    protected $fillable = [
        'name',
        'phone',
        'address',
        'gender',
        'state',
        'file',
        'postcode',
        'date_of_birth',
    ];

    // public function users(): BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }
}
