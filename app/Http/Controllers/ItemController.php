<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Item;
use App\SubCategory;
use App\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    
    public function index()
    {
        $items = Item::all();
        return view('item.index',compact('items'));
    }

    public function create()
    {   
        $categories = Category::all();
        $subcategories  = SubCategory::all();
        $brands  = Brand::all();
        return view('item.create',compact('brands','subcategories','categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|min:2",
            "photo" => "required|mimes:jpeg,jpg,png",
            "price" => "required",
        ]);
        //photo
        if($request->file())
        {
            $fileName = time().'_'.$request->file('photo')->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('itemimg',$fileName,'public');
            $path = '/storage/'.$filePath;
        }
        //codeono
        $codeno = "REV".mt_rand(100000,900000);

        $item = new Item();
        $item->name = $request->name;
        $item->codeno = $codeno;
        $item->photo = $path;
        $item->price = $request->price;
        //checking discount
        if(!empty($request->discount))
        {
            $item->discount = $request->discount;
        }
        $item->description = $request->description;
        $item->brand_id = $request->brand;
        $item->subcategory_id = $request->subcategory;
        $item->save();

        return redirect()->route('item.index');
    }

    public function show(Item $item)
    {
        $brands = Brand::all();
        $subcategories = SubCategory::all();
        return view('item.show',compact('item','brands','subcategories'));
    }

    public function edit(Item $item)
    {
        $brands = Brand::all();
        $subcategories = SubCategory::all();
        $categories = Category::all();
        return view('item.edit',compact('item','brands','subcategories','categories'));
    }

    public function update(Request $request, Item $item)
    {

        $request->validate([
            "name" => "required|min:2",
            "photo" => "sometimes|required|mimes:jpeg,jpg,png",
            "price" => "required",
        ]);

        if($request->file())
        {
            unlink(public_path($request->oldphoto));
            $fileName = time().'_'.$request->file('photo')->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('item',$fileName,'public');
            $path = '/storage/'.$filePath;
        }
        else
        {
            $path = $request->oldphoto;
        }
        // $item = Item::find($id);
        $item->name = $request->name;
        $item->codeno = $request->codeno;
        $item->photo = $path;
        $item->price = $request->price;
        //checking discount
        if(!empty($request->discount))
        {
            $item->discount = $request->discount;
        }
        $item->description = $request->description;
        $item->brand_id = $request->brand;
        $item->subcategory_id = $request->subcategory;
        $item->save();

        return redirect()->route('item.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        unlink(public_path($item->photo));
        $item->delete();
        return redirect()->route('item.index');
    }

    public function filterCategory(Request $request)
    {
        $cid = $request->cid;
        $subcategories = Subcategory::where('category_id',$cid)->get();
        return $subcategories;
    }
}
