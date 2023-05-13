<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class MashinaTest extends TestCase
{

    /** @test */
    public function test_can_create_car(){

        Storage::fake('public');

        $file = UploadedFile::fake()->image('car.jpg');

        $response = $this->post('create-car',[
            'car_name' => "Malibu",
            'car_number' => 'A123EA',
            'car_jarimasi' => 'Svetafor',
            'car_jarima_narxi' => 120000,
            'car_image' => $file,
            'maydon_id' => 1,
            'tuman_id' => 8,
            'viloyat_id' => 1,
        ]);

        $this->assertDatabaseHas('mashinalar',[
            'car_name' => "Malibu",
        ]);


        $response->assertStatus(200);
        Storage::disk('public')->assertExists('/assets/car-info-page' . $file->hashName());
    }
}
