<?php

namespace Tests\Feature;

use App\Models\Mashinalar;
use App\Models\User;
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
        $admin = User::find(1);

        $response = $this->actingAs($admin)->post('create-car',[
            'car_name' => "Matiz",
            'car_number' => 'B809BB',
            'car_jarimasi' => 'Mastlik',
            'car_jarima_narxi' => 150000,
            'car_image' => $file,
            'maydon_id' => 1,
            'tuman_id' => 1,
            'viloyat_id' => 1,
        ]);

        $response->assertStatus(200);

        Storage::disk('public')->put('assets/car-info-page/', $file);
        Storage::disk('public')->assertExists('assets/car-info-page/' . $file->hashName());
    }

    public function test_can_show_cars()
    {
        $cars = Mashinalar::latest()->first();
        $response = $this->get('all-cars' . $cars->id);

        $response
            ->assertStatus(200);
    }

    public function test_can_update_car(){
        Storage::fake('public');
        $file = UploadedFile::fake()->image('car.jpg');
        $cars = Mashinalar::latest()->first();

        $admin = User::find(1);

        $response = $this->actingAs($admin)->post('update-car/' . $cars->id,[
            'car_name' => "Matiz",
            'car_number' => 'B809BB',
            'car_jarimasi' => 'Mastlik',
            'car_jarima_narxi' => 150000,
            'car_image' => $file,
            'maydon_id' => 1,
            'tuman_id' => 1,
            'viloyat_id' => 1,
        ]);

        $response->assertStatus(200);

        Storage::disk('public')->put('assets/car-info-page/', $file);
        Storage::disk('public')->assertExists('assets/car-info-page/' . $file->hashName());

    }


    public function test_can_search_car()
    {
        $response = $this->post('search-car', [
            'query' => 'Malibu',
        ]);

        $response->assertStatus(200);
    }

    public function test_can_delete_car()
    {
        $cars = Mashinalar::latest()->first();
        $response = $this->delete('delete-car/' . $cars->id);

        $response->assertStatus(200);
    }

    public function test_can_download_car()
    {
        $response = $this->get('cars-export');

        $response->assertStatus(200);
    }


}
