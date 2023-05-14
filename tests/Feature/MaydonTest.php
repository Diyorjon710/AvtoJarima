<?php

namespace Tests\Feature;

use App\Models\Maydonlar;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MaydonTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_area(){
        $response = $this->post('create-area',[
            'maydon_nomi' => 'Damachi 12/3',
            'maydon_lokatsiyasi' => '23.3234234,32.1321312',
            'tuman_id' => 4,
        ]);

        $response->assertStatus(200);
    }

    public function test_can_update_area(){

        $maydon = Maydonlar::latest()->first();

        $response = $this->post('update-area/' . $maydon->id,[
            'maydon_nomi' => 'Damachi 12/3',
            'maydon_lokatsiyasi' => '23.3234234,32.1321312',
            'tuman_id' => 4,
        ]);

        $response->assertStatus(200);
    }

    public function test_can_show_areas(){

        $maydon = Maydonlar::latest()->first();
        $response = $this->get('all-areas' . $maydon->id);

        $response->assertStatus(200);
    }

    public function test_can_search_area()
    {
        $response = $this->post('search-area', [
            'query' => 'Qumariq 12/1',
        ]);

        $response->assertStatus(200);
    }

    public function test_can_delete_area()
    {
        $maydon = Maydonlar::latest()->first();
        $response = $this->delete('delete-area/' . $maydon->id);

        $response->assertStatus(200);
    }

    public function test_can_download_area()
    {
        $response = $this->get('areas-export');

        $response->assertStatus(200);
    }
}
