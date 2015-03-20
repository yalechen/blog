<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $table = 'city';

    public $timestamps = false;

    protected $visible = [
        'id',
        'name',
        'sort',
        'remark',
        'province'
    ];

    /**
     * 城市所属的省份
     */
    public function province()
    {
        return $this->belongsTo('App\Province');
    }
}