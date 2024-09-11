<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Traits\ApiResponse;

class profileController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin/profile');
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
            'email' => 'required|string|email|unique:users,email,' . Auth::User()->id,
            'phone' => 'required|string|max:20',
            'image' => 'mimes:jpeg,png,jpg,gif|max:5120',
            'address' => 'required|string|max:255',
            'twitter_link' => 'string|max:255',
            'insta_link' => 'string|max:255',
            'fb_link' => 'string|max:255',
        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {
            $twitter_link = rtrim(str_replace(['https://www.', 'https://'], '', $request->twitter_link), '/');
            $insta_link = rtrim(str_replace(['https://www.', 'https://'], '', $request->insta_link), '/');
            $fb_link = rtrim(str_replace(['https://www.', 'https://'], '', $request->fb_link), '/');

            $image_name = null;
            if ($request->hasFile('image')) {
                $image_name = 'images/' . $request->name . time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/'), $image_name);
            }

            $user = User::updateOrCreate(
                ['id' => Auth::User()->id],
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'image' => $image_name ?: Auth::User()->image,
                    'address' => $request->address,
                    'twitter_link' => $twitter_link,
                    'insta_link' => $insta_link,
                    'fb_link' => $fb_link,
                ]
            );

            return $this->success(['reload' => true], 'Profile updated successfully');
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
