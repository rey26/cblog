<?php

namespace Tests\Unit;

use App\Post;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $first=factory(Post::class)->create();
        $second=factory(Post::class)->create([
        'created_at' => Carbon::now()->subMonth()
        ]);

        Post::archives();

        $this->get('/')->assertSee('');
    }
}
