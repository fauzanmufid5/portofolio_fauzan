<?php

namespace Tests\Feature;

use Database\Seeders\PortfolioSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(PortfolioSeeder::class);
    }

    public function test_home_page_loads(): void
    {
        $this->get('/')->assertOk()->assertSee('Fauzan Ramadhan');
    }

    public function test_about_experience_contact_pages_load(): void
    {
        $this->get('/tentang')->assertOk();
        $this->get('/experience')->assertOk();
        $this->get('/kontak')->assertOk();
    }

    public function test_projects_index_and_show(): void
    {
        $this->get('/projects')->assertOk()->assertSee('Aplikasi Todo Laravel');

        $project = \App\Models\Project::first();
        $this->get('/projects/'.$project->slug)->assertOk()->assertSee($project->title);
    }

    public function test_contact_store_creates_message(): void
    {
        $this->from('/kontak')->post('/kontak', [
            'name' => 'Penguji',
            'email' => 'uji@example.com',
            'subject' => 'Halo',
            'message' => 'Ini pesan pengujian yang cukup panjang.',
        ])->assertRedirect('/kontak')->assertSessionHas('success');

        $this->assertDatabaseHas('messages', ['email' => 'uji@example.com']);
    }

    public function test_contact_validation_rejects_short_message(): void
    {
        $this->post('/kontak', [
            'name' => 'Penguji',
            'email' => 'uji@example.com',
            'message' => 'pendek',
        ])->assertSessionHasErrors('message');

        $this->assertDatabaseMissing('messages', ['email' => 'uji@example.com']);
    }

    public function test_guest_cannot_access_admin(): void
    {
        $this->get('/admin/dashboard')->assertRedirect('/login');
    }

    public function test_admin_can_login_and_open_dashboard(): void
    {
        $this->post('/login', [
            'email' => 'admin@example.com',
            'password' => 'password',
        ])->assertRedirect('/admin/dashboard');

        $this->get('/admin/dashboard')->assertOk()->assertSee('Dashboard');
    }

    public function test_cv_download_returns_pdf(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('cv/test.pdf', '%PDF-1.4 fake');
        \App\Models\Profile::first()->update(['cv_path' => 'cv/test.pdf']);

        $this->get('/cv/download')->assertOk()
            ->assertHeader('content-type', 'application/pdf');
    }

    public function test_cv_download_404_when_missing(): void
    {
        \App\Models\Profile::first()->update(['cv_path' => null]);

        $this->get('/cv/download')->assertNotFound();
    }

    public function test_unknown_project_returns_404(): void
    {
        $this->get('/projects/slug-tidak-ada')->assertNotFound();
    }
}
