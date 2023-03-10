<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComparisonController extends Controller
{
    public function index()
    {
        return view('admin.compare.index', [
            'title' => 'Comparison',
        ]);
    }

    public function store(Request $request)
    {
        $input1 = $request->input('input1');
        $input2 = $request->input('input2');

        $totalLength = strlen($input1);
        $matchLength = 0;

        for ($i = 0; $i < $totalLength; $i++) {
            $char = $input1[$i];
            if (strpos($input2, $char) !== false) {
                $matchLength++;
            }
        }
        $percent = ($matchLength / $totalLength) * 100;

        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Comparison= ' . $percent,
        ]);
    }
}
