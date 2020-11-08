<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
use App\Subcategory;
use App\Brand;

class FrontendController extends Controller
{
  public function home($value='')
  {
    $items = Item::all();
    $categories = Category::all();
    $brands = Brand::all();
    return view('frontend.mainpage',compact('items','categories','brands'));
  }

  public function itemdetail($id)
  {
    $item = Item::find($id);
    return view('frontend.itemdetail',compact('item'));
  }

  public function itembysubcategory($id)
  {
    $mysubcategory = Subcategory::find($id);
    return view('frontend.itembysubcategory',compact('mysubcategory'));
  }

  

  public function cart($value='')
  {
    
    return view('frontend.cartpage');
  }

  public function userlogin($value='')
  {
    
    return view('frontend.userlogin');
  }

  public function userregister($value='')
  {

    return view('frontend.userregister');
  }
}
