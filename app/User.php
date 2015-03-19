<?php


namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

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

	/**
	 * 发布的博文
	 */
	public function articles(){
		return $this->hasMany('App\Article');
	}
}
