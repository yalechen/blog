<?php
namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Hash;
use Auth;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword;

    protected $table = 'users';

    /**
     * 允许批量赋值的属性，即白名单
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'province_id',
        'city_id',
        'region_name',
        'signature'
    ];

    /**
     * 不允许批量赋值的属性，即黑名单
     */
    protected $guarded = [
        'article_count',
        'mood_count'
    ];

    /**
     * 转换成数组或 JSON 时隐藏属性
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $appends = [
        'avatar_url'
    ];

    protected $with = [
        'avatar',
        'province',
        'city'
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model)
        {
            // 保存的时候自动对密码进行加密。
            if (isset($model->password) && Hash::needsRehash($model->password)) {
                $model->password = Hash::make($model->password);
            }

            // 禁止对文章数和心情数进行修改。
            if ($model->isDirty('article_count') || $model->isDirty('mood_count')) {
                return false;
            }

            if ($model->province_id > 0 || $model->city_id > 0) {
                $model->region_name = Province::find($model->province_id)->name . ' ' . City::find($model->city_id)->name;
            }
        });
    }

    /**
     * 发布的博文
     */
    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    /**
     * 所属省份
     */
    public function province()
    {
        return $this->belongsTo('App\Province');
    }

    /**
     * 所属城市
     */
    public function city()
    {
        return $this->belongsTo('App\City');
    }

    /**
     * 用户头像
     */
    public function avatar()
    {
        return $this->belongsTo('App\Storage', 'avatar_hash');
    }

    /**
     * 用户的角色
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_roles');
    }

    /**
     * 头像CDN地址
     */
    /* public function getAvatarUrlAttribute()
    {
        return action('StorageController@getFile', [
            'hash' => $this->avatar_hash
        ]);
    } */

    /**
     * 是否是某种角色
     */
    public function scopeHasRole($query, $key)
    {
        if (! isset($this->hasRole) && Auth::check()) {
            $this->hasRole = in_array(Role::whereKey($key)->first()->id, Auth::user()->roles()->lists('id'));
            return $this->hasRole;
        }
        return $this->hasRole;
    }

    /**
     * 用户的所有权限
     */
    public function getPurviewsAttribute()
    {
        if (! isset($this->purviews)) {
            $this->purviews = array();
            foreach ($this->roles()
                ->with('purviews')
                ->get() as $role) {
                foreach ($role->purviews as $purview) {
                    $this->purviews[$purview->key] = $purview;
                }
            }
        }
        return $this->purviews;
    }
}
