<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{

    protected $table = 'province';

    public $timestamps = false;

    protected $visible = [
        'id',
        'name',
        'sort',
        'remark',
        'city'
    ];

    /**
     * 省份下的城市列表
     */
    public function city()
    {
        return $this->hasMany('App\City');
    }
}