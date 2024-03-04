<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Staff;

class StaffControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_view_staff_index_page()
    {
        $response = $this->get('/staff');

        $response->assertStatus(302);
    }

    public function test_can_create_staff()
    {
        $data = [
            'nip' => 'E41221137',
            'name' => 'Dimas Fajar Kurniawan',
            'role' => 1,
            'email' => 'example@gmail.com',
        ];

        $response = $this->post(route('pages.staffs.store'), $data);

        $this->assertDatabaseHas('staffs', $data);

        $response->assertRedirect(route('pages.staffs.index'));
    }

    public function test_can_update_staff()
    {
        $staff = Staff::factory()->create();

        $data = [
            'nip' => 'E41221137',
            'name' => 'Dimas Fajar Kurniawan',
            'role' => 1,
            'email' => 'example@gmail.com',
        ];

        $response = $this->put(route('pages.staffs.update', $staff->id), $data);

        $this->assertDatabaseHas('staffs', $data);

        $response->assertRedirect(route('pages.staffs.index'));
    }

    public function test_can_delete_staff()
    {
        $staff = Staff::factory()->create();

        $response = $this->delete(route('pages.staffs.destroy', $staff->id));

        $this->assertDatabaseMissing('staffs', ['id' => $staff->id]);

        $response->assertRedirect(route('pages.staffs.index'));
    }
}
