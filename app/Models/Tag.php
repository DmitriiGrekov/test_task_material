<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function materials(){
        return $this->belongsToMany(Material::class, 'tags_materials', 'tag_id', 'material_id');
    }

}
