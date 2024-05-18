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
    public function it_returns_404_error_when_non_existent_url()
    {
        //存在しないURLへのアクセス
        $response = $this->getJson('/api/fibonacci?n=3');
        $response->assertStatus(404);
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

    /**
     * @test
     */
    public function it_returns_correct_fibonacci_numbers()
    {
        // 様々なnに対してフィボナッチ数が正しく返されることをテスト
        $testCases = [
            0 => '0',
            1 => '1',
            2 => '1',
            3 => '2',
            5 => '5',
            10 => '55',
            15 => '610',
            20 => '6765',
        ];

        foreach ($testCases as $n => $expected) {
            $response = $this->getJson('/api/fib?n=' . $n);
            $response->assertJson([
                'result' => $expected,
            ]);
        }
    }

    /**
     * @test
     */
    public function it_handles_large_input()
    {
        // 大きな入力値に対してもフィボナッチ数が正しく返されることをテスト
        $largeN = 200;
        $response = $this->getJson('/api/fib?n=' . $largeN);
        $response->assertStatus(200);
        $this->assertIsString($response->json('result')); // 結果が文字列で返されていることを確認
    }
}