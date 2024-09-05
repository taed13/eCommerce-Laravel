<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\CategoryAttribute;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Traits\SaveFile;
use Illuminate\Support\Facades\Validator;


class categoryController extends Controller
{
    use ApiResponse;
    use SaveFile;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::get();

        return view('admin/Category/category', get_defined_vars());
    }

    /**
     * Display a listing of the resource.
     */
    public function index_category_attribute()
    {
        $data = CategoryAttribute::with('category', 'attribute')->get();
        // prx($data->toArray());
        $category = Category::get();
        $attribute = Attribute::get();

        return view('admin/Category/category_attribute', get_defined_vars());
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
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'parent_category_id',
            'id' => 'required|integer',
        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {
            $imageName = '';
            if ($request->id > 0) {
                $image = Category::find($request->id);
                $imageName = $image->image;

                $imageName = $this->saveFile($request->image, $imageName, 'images/categories');
            } else {
                $imageName = $this->saveFile($request->image, '', 'images/categories');
            }

            $data = [
                'name' => $request->name,
                'slug' => $request->slug,
                'image' => $imageName,
            ];

            if ($request->parent_category_id) {
                $data['parent_category_id'] = $request->parent_category_id;
            }

            $category = Category::updateOrCreate(
                ['id' => $request->id],
                $data
            );

            // category update create handle
            if ($request->id > 0) {
                return $this->success(['reload' => true], 'Category updated successfully');
            } else {
                return $this->success(['reload' => true], 'Category added successfully');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_category_attribute(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'attributes_id' => 'required|exists:attributes,id',
            'category_id' => 'required|exists:categories,id',
            'id' => 'required|integer',
        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {
            $data = [
                'attributes_id' => $request->attributes_id,
                'category_id' => $request->category_id,
            ];

            $categoryAttribute = CategoryAttribute::updateOrCreate(
                ['id' => $request->id],
                $data
            );

            // categoryAttribute update create handle
            if ($request->id > 0) {
                return $this->success(['reload' => true], 'Category Attribute updated successfully');
            } else {
                return $this->success(['reload' => true], 'Category Attribute added successfully');
            }
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
