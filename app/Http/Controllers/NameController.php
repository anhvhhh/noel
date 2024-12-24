<?php

namespace App\Http\Controllers;

use App\Models\Name;
use Illuminate\Http\Request;

class NameController extends Controller
{
    public function get()
    {
        $names = Name::get();
        return response()->json($names);
    }

    public function sent(Request $request) {

         // Validate dữ liệu
         $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Lưu dữ liệu vào database
        Name::create([
            'name' => $request->name,
        ]);

        return response()->json(['message' => 'Name has been saved successfully!']);
    }
}
