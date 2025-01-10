<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Str;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products=Product::paginate(10);
        return View('dashboard.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
       // $tags = implode(',', $product->tags()->pluck('name')->toArray());

        return View('dashboard.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  String $id)
    {

       // $product->update( $request->except('tags') );


        // $tags = json_decode($request->post('tags'));
        // $tag_ids = [];

        // $saved_tags = Tag::all();

        // foreach ($tags as $item) {
        //     $slug = Str::slug($item->value);
        //     $tag = $saved_tags->where('slug', $slug)->first();
        //     if (!$tag) {
        //         $tag = Tag::create([
        //             'name' => $item->value,
        //             'slug' => $slug,
        //         ]);
        //     }
        //     $tag_ids[] = $tag->id;
        // }

        // $product->tags()->sync($tag_ids);
        $product= Product::findOrFail($id);
        $product->update($request->all());
          //PRG Post Redirect Get
          return Redirect::route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
