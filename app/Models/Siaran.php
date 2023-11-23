<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Siaran extends Model
{
    use HasFactory;

    const IS_ACTIVE = false; 

    public function asatidz()
    {
        return $this->belongsTo(Ustadz::class,'ustadz_id');
    }

    public function materikajian()
    {
        return $this->belongsTo(Materi::class,'materi_id');
    }

    public function tempatkajian()
    {
        return $this->belongsTo(Tempat::class,'tempat_id');
    }

    // public function getThumbnailUrl()
    // {
    //     $isUrl = str_contains($this->poster, 'http');

    //     return ($isUrl) ? $this->poster : Storage::disk('public')->url($this->poster);
    // }
}
