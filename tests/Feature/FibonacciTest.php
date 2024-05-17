<?php

namespace Tests\Feature;

use Tests\TestCase;

class FibonacciTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_fibonacci_number()
    {
        // 正常なリクエスト
        $response = $this->getJson('/api/fib?n=10');
        
        $response->assertStatus(200);
        $response->assertJson([
            'result' => '55', // フィボナッチ数列の10番目は55
        ]);
    }

    /**
     * @test
     */
    public function it_validates_input()
    {
        // 不正なリクエスト（nが負の数）
        $response = $this->getJson('/api/fib?n=-1');
        
        $response->assertStatus(422); // バリデーションエラー
    }

    /**
     * @test
     */
    public function it_returns_400_error_when_n_is_missing()
    {
        // nが指定されていないリクエスト
        $response = $this->getJson('/api/fib');
        
        $response->assertStatus(400); // 400 Bad Request
    }
}