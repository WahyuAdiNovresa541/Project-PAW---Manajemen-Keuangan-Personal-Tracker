<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_the_homepage_redirects_to_login(): void
    {
        $this->get('/')->assertRedirect('/login');
    }
}
