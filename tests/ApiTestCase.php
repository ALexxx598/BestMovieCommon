<?php

namespace BestMovie\Tests;

use Faker\Generator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class ApiTestCase extends TestCase
{
    use CreatesApplication;
    use RefreshDatabase;
    use WithFaker;

    /**
     * The Faker instance.
     *
     * @var Generator
     */
    protected $faker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpFaker();
    }
}
