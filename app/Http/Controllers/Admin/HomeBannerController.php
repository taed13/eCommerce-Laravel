<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class HomeBannerController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = HomeBanner::get();

        return view('admin/HomeBanner/home_banners', get_defined_vars());
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
            'text'    => 'required|string|max:255',
            'image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'link' => 'required|string|max:255',
            'id' => 'required|integer',
        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {
            if ($request->hasFile('image')) {
                if ($request->id > 0) {
                    $image = HomeBanner::where('id', $request->id)->first();
                    $image_path = "images/{$image->image}";

                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                $image_name = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/'), $image_name);
            } elseif ($request->id > 0) {
                $image_name = HomeBanner::where('id', $request->id)->pluck('image')->first();
            } else {
                $image_name = '';
            }

            $homeBanner = HomeBanner::updateOrCreate(
                ['id' => $request->id],
                [
                    'text' => $request->text,
                    'image' => $image_name,
                    'link' => $request->link,
                ]
            );
            // home banner update create handle
            if ($request->id > 0) {
                return $this->success(['reload' => true], 'Home banner updated successfully');
            } else {
                return $this->success(['reload' => true], 'Home banner added successfully');
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
