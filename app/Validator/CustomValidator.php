<?php
namespace App\Validator;

use Illuminate\Validation\Validator;

class CustomValidator extends Validator
{

    /**
     * 手机号验证
     */
    public function validateMobile($attribute, $value, $parameters)
    {
        if (preg_match('/^1[3|4|5|7|8][0-9]{9}$/', $value)) {
            return true;
        }
        return false;
    }
}
