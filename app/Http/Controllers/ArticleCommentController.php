<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    /**
     * 显示指定博文的评论。
     *
     * @param int $articleId
     * @param int $commentId
     * @return Response
     */
    public function show($articleId, $commentId)
    {
        //
    }
}
