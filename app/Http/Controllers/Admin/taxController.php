<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tax;
use App\Traits\ApiResponse;
use App\Traits\SaveFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class taxController extends Controller
{
    use ApiResponse;
    use SaveFile;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tax::get();

        return view('admin/Tax/tax', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'text' => 'required|integer',
            'id' => 'required|integer',
        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {
            $tax = Tax::updateOrCreate(
                ['id' => $request->id],
                [
                    'text' => $request->text,
                ]
            );
            // Tax update create handle
            if ($request->id > 0) {
                return $this->success(['reload' => true], 'Tax updated successfully');
            } else {
                return $this->success(['reload' => true], 'Tax added successfully');
            }
        }
    }
}
