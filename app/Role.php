<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{

    // 配置软删除
    use SoftDeletes;

    protected $dates = [
        'deleted_at'
    ];

    protected $table = 'roles';

    protected $fillable = array(
        'key',
        'name'
    );

    /**
     * 角色下的用户
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_roles');
    }

    /**
     * 角色拥有的权限
     */
    public function purviews()
    {
        return $this->belongsToMany('App\Purview', 'role_purviews');
    }
}
