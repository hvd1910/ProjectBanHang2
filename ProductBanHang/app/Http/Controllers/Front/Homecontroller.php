<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Product;
use App\Services\Blog\BlogServiceInterface;
use App\Services\Product\ProductService;
use App\Services\Product\ProductServiceInterface;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    //
    private $productService;
    private $blogService;

    public function __construct(ProductServiceInterface $productService,
                                BlogServiceInterface $blogService)
    {
        $this->productService = $productService;
        $this->blogService = $blogService;
    }


    public function index() {
            $featuredProducts = $this->productService->getFeaturedProducts();
            $blogs = $this->blogService->getLatestBlogs();

            return view('front.index', compact('featuredProducts', 'blogs' ));
    }


//    public function index(){
//        $menproducts = Product::where('featured', true)->where('product_category_id', 1)->get();
//        $womenproducts = Product::where('featured', true)->where('product_category_id', 2)->get();
//
//        $blogs = Blog::orderBy('id', 'desc') -> limit(3)->get();
//
//        return view('front.index', compact('menproducts','womenproducts', 'blogs'));
//
//    }
 }
