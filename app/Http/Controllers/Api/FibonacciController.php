<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FibonacciRequest;

/**
 * Class FibonacciController
 * @package App\Http\Controllers\Api
 */
class FibonacciController extends Controller
{
    /**
     * フィボナッチ数を計算するために入ってくるリクエストを処理する
     *
     * @param FibonacciRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function fibonacci(FibonacciRequest $request)
    {   
        $n = $request->query('n'); 
        $fibonacciNumber = $this->calculateFibonacci($n);

        return response()->json(["result" => (string)$fibonacciNumber], 200);
    }

    /**
     * n番目のフィボナッチ数を計算する
     *
     * @param int $n
     * @return string n番目のフィボナッチ数をstringで返す
     */
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
