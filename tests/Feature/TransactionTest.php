<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function a_transaction_can_be_created(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/transactions', [
            'type' => 1,
            'amount' => 62.35,
            'date' => '01/25/2021',
            'from_bucket_id' => 1,
            'to_bucket_id' => null,
            'payee_id' => 1,
            'check_number' => '1471',
            'description' => 'Dinner at Thai Restaurant',
        ]);

        $transaction = Transaction::first();

        self::assertCount(1, Transaction::all());
        $response->assertRedirect($transaction->path);
    }
}
