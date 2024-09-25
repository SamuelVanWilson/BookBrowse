<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pencipta extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $fillable = ['nama'];

    public function book():HasMany {
        return $this->hasMany(Admin::class);
    }
}
