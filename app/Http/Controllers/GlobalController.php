<?php
namespace App\Http\Controllers;

use App\City;
use App\District;
use Input;

class GlobalController extends Controller
{

    /**
     * 获取某省份下城市列表
     */
    public function getCity()
    {
        return City::whereProvinceId(Input::get("province_id", '0'))->get();
    }

    /**
     * 获取某城市下区县列表
     */
    public function getDistrict()
    {
        return District::whereCityId(Input::get("city_id", '0'))->get();
    }
}
