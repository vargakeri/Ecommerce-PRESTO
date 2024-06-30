<?php

namespace App\Models;

use App\Models\Image;
use Mockery\Matcher\Type;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory,Searchable;
    protected $fillable = ['title', 'body', 'price'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public static function toBeRevisionedCount()
    {
        return Announcement::where('is_accepted', null)->count();
    }

    public function toSearchableArray()
    {
        $category = $this->category;
        $array=[
            'id'=>$this->id,
            'title'=>$this->title,
            'body'=>$this->body,
            'category'=>$category,
        ];
        return $array;
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function user_favorite_announcements()
    {
        return $this->belongsToMany(User::class, 'announcement_user', 'announcement_id', 'user_id')->withTimestamps();
    }

}
