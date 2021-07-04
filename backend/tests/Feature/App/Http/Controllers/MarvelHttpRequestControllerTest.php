<?php

namespace Tests\Feature\App\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MarvelHttpRequestControllerTest extends TestCase
{
    /** @var array */
    private array $characters = [
        "Hulk", "Iron Man", "Captain America"
    ];

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_should_retrieve_all_characters()
    {
        $response = $this->get($this->makeUrl());

        $response->assertStatus(200);

        $this->assertEquals(count($this->characters), count($response->decodeResponseJson()));
    }

    /**
     * Mount properly the characters request url.
     * 
     * @param void
     * 
     * @return string
     */
    private function makeUrl(): string
    {
        $placeholders = implode(",", array_fill(0, count($this->characters), "%s"));

        $baseUrl = sprintf("api/marvel/characters?characters=%s", $placeholders);

        return sprintf($baseUrl, ...$this->characters);
    }
}
