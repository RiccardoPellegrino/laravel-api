<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name_project', 'slug', 'description','framework','team','link_git','lvl_diff','cover_image','type_id'];

    public static function generateSlug($name_project)
    {
        return Str::slug($name_project, '-');
    }
    public function types():BelongsTo{
        return $this->belongsTo(Type::class);
    }
    public function languages():BelongsToMany{
        return $this->belongsToMany(Language::class);
    }
}
