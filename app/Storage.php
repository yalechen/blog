<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{

    protected $table = 'storage';

    protected $primaryKey = 'hash';

    public $incrementing = false;

    protected $visible = [
        'hash',
        'size',
        'width',
        'height',
        'mime',
        'seconds',
        'format'
    ];
}
