<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Contact;

class ContactTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function contact_check()
    {
        $contact = Contact::factory()->create([
            'name' => '山田太郎',
            'kana' => 'ヤマダタロウ',
            'email' => 'test@test.com',
            'kind' => '1',
            'body' => '日向市駅以外にありますか？',
        ]);

        $this->assertAuthenticated($contact);
    }
}
