<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{

    //Index

    public function index()
    {

        $product_hot = DB::table('tpl_product')->where('status', 1)->orderBy('product_price', 'desc')->limit(4)->get();
        $product_new = DB::table('tpl_product')->where('status', 1)->orderBy('created_at', 'desc')->limit(4)->get();
        $product_cate = DB::select('select * from tpl_category where status = ?', [1]);
        return view('pages.client.index')
            ->with('product_hot', $product_hot)
            ->with('product_new', $product_new)
            ->with('product_cate', $product_cate);
    }

    //Product

    public function product()
    {
        $product = DB::table('tpl_product')->where('status', 1)->orderBy('product_id', 'asc')->get();
        $product_hot = DB::table('tpl_product')->where('status', 1)->orderBy('product_price', 'desc')->limit(6)->get();
        $product_new = DB::table('tpl_product')->where('status', 1)->orderBy('created_at', 'desc')->limit(6)->get();
        $product_cate = DB::select('select * from tpl_category where status = ?', [1]);
        $portfolio = DB::select('select * from tpl_portfolio where status = ?', [1]);

        return view('pages.client.productlist')
            ->with('product', $product)
            ->with('product_cate', $product_cate)
            ->with('product_hot', $product_hot)
            ->with('product_new', $product_new)
            ->with('portfolio', $portfolio);
    }
    public function product_detail($id)
    {

        $product_detail = DB::table('tpl_product')
            ->join('tpl_portfolio', 'tpl_portfolio.port_id', 'tpl_product.port_id')
            ->join('tpl_category', 'tpl_category.cate_id', '=', 'tpl_product.cate_id')
            ->where('tpl_product.product_id', $id)->first();

        $product_relate = DB::table('tpl_product')
            ->join('tpl_portfolio', 'tpl_portfolio.port_id', 'tpl_product.port_id')
            ->join('tpl_category', 'tpl_category.cate_id', '=', 'tpl_product.cate_id')
            ->where('tpl_product.product_id', $id)->get();

        foreach ($product_relate as $key => $value) {

            $cate_id = $value->cate_id;
        }
        $list = DB::table('tpl_product')
            ->join('tpl_category', 'tpl_category.cate_id', '=', 'tpl_product.cate_id')
            ->where('tpl_category.cate_id', $cate_id)
            ->whereNotIn('tpl_product.product_id', [$id])
            ->get();
        return view('pages.client.productdetail')
            ->with('list', $list)
            ->with('product_detail', $product_detail);
    }

    //Article

    public function article()
    {
        $article = DB::table('tpl_article')->where('status', '1')->orderBy('created_at', 'desc')->get();
        $product_cate = DB::select('select * from tpl_category where status = ?', [1]);
        return view('pages.client.articlelist')
            ->with('article', $article)
            ->with('product_cate', $product_cate);
    }
    public function article_detail($id)
    {
        $article = DB::table('tpl_article')
            ->join('users', 'users.id', '=', 'tpl_article.user_id')
            ->where('tpl_article.article_id', $id)->first();
        return view('pages.client.articledetail')
            ->with('article', $article);
    }

    //Category

    public function categories_detail()
    {
        $categories = DB::select('select * from tpl_category where status = ?', [1]);
        return view('pages.client.categoriesdetail')->with('categories', $categories);
    }


    public function categories_list($id)
    {
        $product_cate = DB::select('select * from tpl_category where status = ?', [1]);
        $portfolio = DB::select('select * from tpl_portfolio where status = ?', [1]);
        $categories = Category::find($id);
        $product_by_category = DB::table('tpl_product')
            ->join('tpl_category', 'tpl_category.cate_id', '=', 'tpl_product.cate_id')
            ->where('tpl_category.cate_id', $id)->get();
        return view('pages.client.categorieslist')
            ->with('categories', $categories)
            ->with('portfolio', $portfolio)
            ->with('product_cate', $product_cate)
            ->with('product_by_category', $product_by_category);
    }

    //Brand

    public function portfolio_detail()
    {
        $portfolio = DB::select('select * from tpl_portfolio where status = ?', [1]);
        return view('pages.client.portfoliodetail')->with('portfolio', $portfolio);
    }

    public function portfolio_list($id)
    {
        $product_cate = DB::select('select * from tpl_category where status = ?', [1]);
        $portfolio = DB::select('select * from tpl_portfolio where status = ?', [1]);
        $port = Portfolio::find($id);
        $product_by_portfolio = DB::table('tpl_product')
            ->join('tpl_portfolio', 'tpl_portfolio.port_id', '=', 'tpl_product.port_id')
            ->where('tpl_portfolio.port_id', $id)->get();
        return view('pages.client.portfoliolist')
            ->with('port', $port)
            ->with('portfolio', $portfolio)
            ->with('product_cate', $product_cate)
            ->with('product_by_portfolio', $product_by_portfolio);
    }

    public function cart()
    {
        return view('pages.client.cart');
    }
    public function check_out()
    {
        return view('pages.client.checkout');
    }
    public function contact_us()
    {
        return view('pages.client.contactus');
    }
    public function favorite()
    {
        return view('pages.client.favorite');
    }
    public function my_account()
    {
        return view('pages.client.myaccount');
    }

    public function about_us()
    {
        return view('pages.client.aboutUs');
    }
    public function search(request $request)
    {
        $key = $request->key;

        $product = DB::table('tpl_product')
            ->where('');
    }
}
