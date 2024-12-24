<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImages;
use Illuminate\Http\Request;

class DeleteImageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ProductImages $image)
    {
        $image->delete();

        return response()->json(['success' => true, 'message' => 'image deleted successfully'], 200);
    }
}
