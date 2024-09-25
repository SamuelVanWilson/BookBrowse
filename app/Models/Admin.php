<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Admin extends Model
{
    use HasFactory;
    public $fillable = ['judul', 'pencipta_id', 'tahun_terbit', 'nama_penerbit', 'kategori_id', 'sinopsis', 'cover'];
    public $with = ['pencipta', 'category'];

    public function scopeFilter(Builder $query, array $data) {
        $query->when($data['search'] ?? false, fn ($query, $search) => $query->where('judul', 'like', '%'.$search.'%'));
        $query->when($data['category'] ?? false,
         fn ($query, $category) => $query->whereHas('category', fn ($query) => $query->where('nama', $category)));
        $query->when($data['penulis'] ?? false, 
         fn ($query, $penulis) => $query->whereHas('pencipta', fn ($query) => $query->where('nama', $penulis)));
    }
    public function getRouteKeyName()
    {
        return 'judul';
    }
    public function pencipta():BelongsTo {
        return $this->belongsTo(Pencipta::class);
    }
    public function category():BelongsTo {
        return $this->belongsTo(Categeory::class, 'kategori_id');
    }
}
