<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    use ApiResponse;
    public function index()
    {
        return view('admin/index');
    }

    public function deleteData($id = null, $table = null)
    {
        DB::table($table)->where('id', $id)->delete();
        return $this->success(['reload' => true], 'Data deleted successfully');
    }
}
