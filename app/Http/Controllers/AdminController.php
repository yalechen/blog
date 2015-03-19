<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    /**
     * 博客首页
     */
    public function getIndex()
    {
        return view('admin.index');
    }
}