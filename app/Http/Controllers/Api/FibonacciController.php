<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FibonacciRequest;

class FibonacciController extends Controller
{
    public function fibonacci(FibonacciRequest $request)
    {   
        $n = $request->query('n'); 
        $fibonacciNumber = $this->calculateFibonacci($n);

        return response()->json(["result" => (string)$fibonacciNumber], 200);
    }

    private function calculateFibonacci($n)
    {
        $a = '1';
        $b = '0';

        for ($i = 1; $i <= $n; $i++) {
            $temp = $a;
            $a = bcadd($a, $b);
            $b = $temp;
        }

        return $b;
    }
}
