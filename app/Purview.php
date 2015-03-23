<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purview extends Model
{

    // 配置软删除
    use SoftDeletes;

    protected $dates = [
        'deleted_at'
    ];

    protected $table = 'purviews';

    protected $fillable = array(
        'key',
        'description'
    );

    /**
     * 拥有此权限的角色
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_purviews');
    }
}
