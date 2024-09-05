<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Traits\SaveFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class brandController extends Controller
{
    use ApiResponse;
    use SaveFile;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Brand::get();

        return view('admin/Brand/brands', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'text'    => 'required|string|max:255',
            'image'   => 'mimes:jpeg,png,jpg,gif,svg|max:5120',
            'id' => 'required|integer',
        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {
            if ($request->id > 0) {
                $image = Brand::find($request->id);
                $imageName = $image->image;

                if ($request->hasFile('image')) {
                    $imageName = $this->saveFile($request->image, $imageName, 'images/brands');
                }
            } else {
                $imageName = $this->saveFile($request->image, '', 'images/brands');
            }

            $brand = Brand::updateOrCreate(
                ['id' => $request->id],
                [
                    'text' => $request->text,
                    'image' => $imageName,
                ]
            );
            // Brand update create handle
            if ($request->id > 0) {
                return $this->success(['reload' => true], 'Brand updated successfully');
            } else {
                return $this->success(['reload' => true], 'Brand added successfully');
            }
        }
    }
}
