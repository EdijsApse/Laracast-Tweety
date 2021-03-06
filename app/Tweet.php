<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use App\Traits\Likable;
use Illuminate\Support\Facades\Storage;

class Tweet extends Model
{

    use Likable;

    protected $fillable = ['user_id', 'body', 'image'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function storeImage(UploadedFile $image) {
        return $image->store('tweets');
    }

    public function hasImage() {
        return (bool) $this->image;
    }

    public function getImagePath() {
        return asset('storage/'.$this->image);
    }

    public function remove() {

        if ($this->image) {
            Storage::delete($this->image);
        }

        $this->delete();
    }
}
