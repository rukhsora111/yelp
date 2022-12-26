<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Comment extends Model implements \Spatie\MediaLibrary\HasMedia

{
    use HasFactory, \Spatie\MediaLibrary\InteractsWithMedia;


    protected $table = 'comments';
 
    protected $fillable = [
        'username',
        'text',
        'organisation_id',
        'user_id',
    ];
  
    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }
 

    /**
     */
    public function __construct() {
    }
}
