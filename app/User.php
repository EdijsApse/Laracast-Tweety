<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use App\Traits\Followable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'avatar', 'banner', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }


    public function timeline() {

        $friends = $this->follows()->pluck('following_user_id');

        return Tweet::whereIn('user_id', $friends)->orWhere('user_id', $this->id)->withLikes()->latest()->paginate(15);
    }

    public function tweets() {
        return $this->hasMany(Tweet::class);
    }

    public function getBannerPath() {
        return asset($this->hasBanner() ? 'storage/'.$this->banner : 'storage/banners/_default_banner.jpg');
    }

    public function getAvatarPath() {
        return asset($this->hasAvatar() ? 'storage/'.$this->avatar : 'storage/avatars/_default.jpg');
    }

    public function hasAvatar() {
        return (bool) $this->avatar;
    }

    public function hasBanner() {
        return (bool) $this->banner;
    }

    public function storeAvatar(UploadedFile $avatar) {
        if ($this->hasAvatar()) {
            Storage::delete($this->avatar);
        }

        return $avatar->store('avatars');
    }

    public function storeBanner(UploadedFile $banner) {
        if ($this->hasBanner()) {
            Storage::delete($this->banner);
        }

        return $banner->store('banners');
    }

    public function getRouteKeyName() {
        return 'username';
    }

    public function profileLink() {
        return route('profile', $this);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }
}
