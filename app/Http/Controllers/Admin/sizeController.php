<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class sizeController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Size::get();

        return view('admin/Size/size', get_defined_vars());
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
            'id' => 'required|integer',
        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {
            $size = Size::updateOrCreate(
                ['id' => $request->id],
                [
                    'text' => $request->text,
                ]
            );
            // size update create handle
            if ($request->id > 0) {
                return $this->success(['reload' => true], 'Size updated successfully');
            } else {
                return $this->success(['reload' => true], 'Size added successfully');
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
