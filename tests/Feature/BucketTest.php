<?php

namespace Tests\Feature;

use App\Models\Bucket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BucketTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_bucket_can_be_added(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/buckets', [
            'name' => 'USAA Checking',
            'description' => 'Primary checking account at USAA Federal Savings Bank',
            'balance' => 2587.84,
            'account_number' => '23830123',
            'routing_number' => '314074269',
        ]);

        $bucket = Bucket::first();

        self::assertCount(1, Bucket::all());
        $response->assertRedirect('/buckets/'.$bucket->id);
    }

    /** @test **/
    public function a_name_is_required(): void
    {
        $this->withExceptionHandling();

        $response = $this->post('/buckets', [
            'name' => '',
            'description' => 'Primary checking account at USAA Federal Savings Bank',
            'balance' => 2587.84,
            'account_number' => '23830123',
            'routing_number' => '314074269',
        ]);

        $response->assertSessionHasErrors('name');
    }

    /** @test **/
    public function a_balance_is_required(): void
    {
        $this->withExceptionHandling();

        $response = $this->post('/buckets', [
            'name' => 'USAA Checking',
            'description' => 'Primary checking account at USAA Federal Savings Bank',
            'balance' => null,
            'account_number' => '23830123',
            'routing_number' => '314074269',
        ]);

        $response->assertSessionHasErrors('balance');
    }

    /** @test **/
    public function a_bucket_can_be_updated(): void
    {
        $this->withoutExceptionHandling();

        $this->post('/buckets', [
            'name' => 'USAA Checking',
            'description' => 'Primary checking account at USAA Federal Savings Bank',
            'balance' => 2587.84,
            'account_number' => '23830123',
            'routing_number' => '314074269',
        ]);

        $bucket = Bucket::first();

        $response = $this->patch('/buckets/'.$bucket->id, [
            'name' => 'Checking',
            'balance' => 3389.45,
        ]);

        self::assertEquals('Checking', Bucket::first()->name);
        self::assertEquals(3389.45, Bucket::first()->balance);
        $response->assertRedirect('/buckets/'.$bucket->id);
    }

    /** @test **/
    public function a_bucket_can_be_deleted(): void
    {
        $this->post('/buckets', [
            'name' => 'USAA Checking',
            'description' => 'Primary checking account at USAA Federal Savings Bank',
            'balance' => 2587.84,
            'account_number' => '23830123',
            'routing_number' => '314074269',
        ]);

        $bucket = Bucket::first();
        self::assertCount(1, Bucket::all());

        $response = $this->delete('/buckets/'.$bucket->id);
        self::assertCount(0, Bucket::all());
        $response->assertRedirect('/buckets');
    }

}
