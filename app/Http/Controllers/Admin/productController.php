<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CategoryAttribute;
use App\Models\Color;
use App\Models\ProductAttr;
use App\Models\ProductAttrImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;
use App\Traits\SaveFile;
use App\Models\Product;
use App\Models\Size;
use App\Models\Tax;
use Illuminate\Support\Facades\Redirect;

class productController extends Controller
{
    use ApiResponse;
    use SaveFile;

    public function index()
    {
        $data = Product::get();

        return view('admin/Product/product', get_defined_vars());
    }

    public function view_product($id = 0)
    {
        if ($id == 0) {
            $data = new Product();
            $product_attr = new ProductAttr();
            $product_attr_images = new ProductAttrImages();
            $category = Category::get();
            $brand = Brand::get();
            $color = Color::get();
            $size = Size::get();
            $tax = Tax::get();
        } else {
            $data['id'] = $id;

            //update product
            $validation = Validator::make($data, [
                'id' => 'required|exists:products,id',
            ]);

            if ($validation->fails()) {
                return Redirect::back();
            } else {
                $data = Product::where('id', $id)->first();
            }
        }

        return view('admin/Product/manage_product', get_defined_vars());
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'mimes:jpeg,png,jpg,gif|max:5120',
            'category_id' => 'required|numeric',
            'sub_category_id' => 'required|numeric',
            'status' => 'required|numeric',
        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {
            $image_name = null;
            if ($request->hasFile('image')) {
                $image_name = $this->saveFile($request->image, 'images');
            }

            $product = Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $image_name,
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'status' => $request->status,
            ]);

            return $this->success('Product added successfully', 200, $product);
        }
    }

    public function getAttributes(Request $request)
    {
        $category_id = $request->category_id;
        $data = CategoryAttribute::where('category_id', $category_id)->with('attribute', 'values')->get();

        return $this->success(['data' => $data], 'Successfully updated', 200);
    }
}
