<?php

namespace App\Http\Controllers;
use App\Brand;
use App\Category;
use App\Promotion;
use App\Family;
use App\Product;
use App\PromotionProduct;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
class PromotionController extends Controller
{

    protected $authUser;

    protected $request;


    public function index()
    {
        $promotions = Promotion::all();
        return view('promotions.index',compact('promotions'));

    }
    public function newPromotion()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::all();

        return view('promotions.new',compact('categories','brands','products'));
    }
    public function createPromotion(Request $request)
    {
        $inputs = $request->all();
        $promotion = new Promotion;
        $promotion->name = $inputs['name'];
        $promotion->description = $inputs['description'];
        $promotion->percentage = $inputs['percentage'];
        $promotion->begin = Carbon::parse(($inputs['from']));
        $promotion->end = Carbon::parse(($inputs['to']));
        $promotion->save();
        if(isset($inputs['products'])) {
            foreach ($inputs['products'] as $product) {
                $promotionproduct = new PromotionProduct;
                $promotionproduct->promotion_id = $promotion->id;
                $promotionproduct->product_id = $product;
                $promotionproduct->save();
            }
        }
        return redirect('/promotions');
    }
    public function editPromotion($id)
    {
        $promotion= Promotion::where('id',$id)->first();
        $promotion->products = PromotionProduct::where('promotion_id',$id)->lists('product_id')->toArray();
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::all();
        return view('promotions.edit',compact('promotion','categories','brands','products'));
    }
    public function postEditPromotion(Request $request,$id)
    {
        $inputs = $request->all();
        $promotion = Promotion::where('id',$id)->first();
        $promotion->name = $inputs['name'];
        $promotion->description = $inputs['description'];
        $promotion->percentage = $inputs['percentage'];
        $promotion->begin = Carbon::parse(($inputs['from']));
        $promotion->end = Carbon::parse(($inputs['to']));
        $promotion->save();

        $promoproducts = PromotionProduct::where('promotion_id',$promotion->id)->get();
        foreach($promoproducts as $promo)
        {
            $promo->delete();
        }
        if(isset($inputs['products'])) {
            foreach ($inputs['products'] as $product) {
                $promotionproduct = new PromotionProduct;
                $promotionproduct->promotion_id = $promotion->id;
                $promotionproduct->product_id = $product;
                $promotionproduct->save();
            }
        }
        return redirect('/promotions');
    }
    public function disablePromotion($id)
    {
        $promotion = Promotion::where('id',$id)->first();

            $promotion->active = 0;
            $promotion->save();

        return redirect('/promotions');
    }
    public function enablePromotion($id)
    {
        $promotion = Promotion::where('id',$id)->first();

        $promotion->active = 1;
        $promotion->save();

        return redirect('/promotions');
    }





}
