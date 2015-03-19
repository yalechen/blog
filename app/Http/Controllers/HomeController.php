<?php
namespace App\Http\Controllers;

use App\Article;
use App\Category;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 博客首页
     */
    public function index()
    {
        // 最近的博文
        $articles = Article::latest()->whereIsPublic(Article::PUBLIC_YES)->paginate(15);

        // 找出15个按分月分类的博文导航
        $months = Article::whereIsPublic(Article::PUBLIC_YES)->distinct()
            ->select('pmonth')
            ->get()
            ->toArray();
        rsort($months);
        $months = preg_replace('/(\d{4})(\d{2})/', '$1年$2月', $months);

        // 一级分类
        $categorys = Category::whereParentPath('')->orderBy('sort', 'desc')->get();

        return view('index')->withData($articles)->with(compact('months', 'articles', 'categorys'));
    }
}
