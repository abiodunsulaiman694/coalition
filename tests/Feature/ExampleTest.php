<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
//     function setUp()
// {
//     parent::setUp();
//     config(['app.url' => 'http://localhost/coalition/public']);
// }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');
        //$response = $this->get(route('welcome'));

        $response->assertStatus(200);
    }
}
