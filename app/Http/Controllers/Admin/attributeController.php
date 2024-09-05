<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Validator;

class attributeController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index_attribute_name()
    {
        $data = Attribute::get();

        return view('admin/Attribute/attribute', get_defined_vars());
    }

    /**
     * Display a listing of the resource.
     */
    public function index_attribute_value()
    {
        $data = AttributeValue::with('singleAttribute')->get();
        $attribute = Attribute::get();

        return view('admin/Attribute/attribute_value', get_defined_vars());
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
    public function store_attribute_name(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'id' => 'required|integer',
        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
            // return response()->json(['status' => 400, 'message' => $validation->errors()->first()]);
        } else {
            $attribute = Attribute::updateOrCreate(
                ['id' => $request->id],
                [
                    'name' => $request->name,
                    'slug' => $request->slug,
                ]
            );
            // attribute update create handle
            if ($request->id > 0) {
                return $this->success(['reload' => true], 'Attribute updated successfully');
            } else {
                return $this->success(['reload' => true], 'Attribute added successfully');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_attribute_value(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'attribute_id' => 'required|exists:attributes,id',
            'value' => 'required|string|max:255',
            'id' => 'required|integer',
        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {
            $attribute_value = AttributeValue::updateOrCreate(
                ['id' => $request->id],
                [
                    'attributes_id' => $request->attribute_id,
                    'value' => $request->value,
                ]
            );

            // attribute_value update create handle
            if ($request->id > 0) {
                return $this->success(['reload' => true], 'Attribute value updated successfully');
            } else {
                return $this->success(['reload' => true], 'Attribute value added successfully');
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
