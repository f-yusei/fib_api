<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FibonacciController extends Controller
{
    public function fibonacci(Request $request)
    {   
        $n = $request->query('n'); 
        $fibonacciNumber = $this->calculateFibonacci($n);

        return response()->json(["result" => $fibonacciNumber], 200);
    }

    private function calculateFibonacci($n)
    {
        $fibonacci = [];
        $fibonacci[0] = 0;
        $fibonacci[1] = 1;

        for ($i = 2; $i <= $n; $i++) {
            $fibonacci[$i] = bcadd($fibonacci[$i - 1], $fibonacci[$i - 2]);
        }

        return $fibonacci[$n];
    }
}

