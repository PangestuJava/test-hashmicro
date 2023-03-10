<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NumberedController extends Controller
{
    public function index()
    {
        // view
        return view('admin.numbered.index', [
            'title' => 'Number'
        ]);
    }

    public function convert(Request $request)
    {
        $number = $request->input('number');
        $word = $this->numberToWord($number);
        return view('admin.numbered.index', [
            'title' => 'Number To Word'
        ], compact('word'));
    }

    private function numberToWord($number)
    {
        $bilangan = [
            '',
            'Satu',
            'Dua',
            'Tiga',
            'Empat',
            'Lima',
            'Enam',
            'Tujuh',
            'Delapan',
            'Sembilan',
            'Sepuluh',
            'Sebelas'
        ];

        if ($number < 12) {
            return $bilangan[$number];
        } elseif ($number < 20) {
            return $bilangan[$number - 10] . ' Belas';
        } elseif ($number < 100) {
            return $bilangan[floor($number / 10)] . ' Puluh ' . $bilangan[$number % 10];
        } elseif ($number < 200) {
            return 'Seratus ' . $this->numberToWord($number - 100);
        } elseif ($number < 1000) {
            return $bilangan[floor($number / 100)] . ' Ratus ' . $this->numberToWord($number % 100);
        } elseif ($number < 2000) {
            return 'Seribu ' . $this->numberToWord($number - 1000);
        } elseif ($number < 1000000) {
            return $this->numberToWord(floor($number / 1000)) . ' Ribu ' . $this->numberToWord($number % 1000);
        } elseif ($number < 1000000000) {
            return $this->numberToWord(floor($number / 1000000)) . ' Juta ' . $this->numberToWord($number % 1000000);
        } elseif ($number < 1000000000000) {
            return $this->numberToWord(floor($number / 1000000000)) . ' Milyar ' . $this->numberToWord($number % 1000000000);
        } elseif ($number < 1000000000000000) {
            return $this->numberToWord(floor($number / 1000000000000)) . ' Trilyun ' . $this->numberToWord($number % 1000000000000);
        } else {
            return 'Sorry, number is too big';
        }
    }
}
