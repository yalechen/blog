<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Input;
use Validator;
use Response;
use Auth;

class AdminController extends Controller
{

    /**
     * 后台首页
     */
    public function getIndex()
    {
        dd(Auth::user());
        return view('admin.index');
    }
}
