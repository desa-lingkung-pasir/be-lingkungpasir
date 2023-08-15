<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table='pengumumans';

    protected $fillable=[
        'title',
        'desc',
        'image',
        'slug'
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($pengumuman) {
    //         $pengumuman->slug = $pengumuman->createSlug($pengumuman->title);
    //         $pengumuman->save();
    //     });
    // }

    // /** 
    //  * Write code on Method
    //  *
    //  * @return response()
    //  */
    // private function createSlug($title){
    //     if (static::whereSlug($slug = Str::slug($title))->exists()) {

    //         $max = static::whereTitle($title)->latest('id')->skip(1)->value('slug');

    //         if (is_numeric($max[-1])) {
    //             return preg_replace_callback('/(\d+)$/', function ($mathces) {
    //                 return $mathces[1] + 1;
    //             }, $max);
    //         }
    //         return "{$slug}-2";
    //     }
    //     return $slug;
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
