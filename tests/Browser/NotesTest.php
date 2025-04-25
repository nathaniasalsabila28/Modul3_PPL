<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NotesTest extends DuskTestCase
{
    
    public function testNotes(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // Mengunjungi halaman utama aplikasi.
                ->assertSee('Modul 3') // Memastikan teks 'Modul 3' ada di halaman.
                ->clickLink('Log in') // Mengklik link 'Log in'.
                ->assertPathIs('/login') // Memastikan berada di halaman '/login'.
                ->type('email','admin@gmail.com') // Mengisi email dengan 'admin@gmail.com'.
                ->type('password','123456') // Mengisi password dengan '123456'.
                ->press('LOG IN') // Menekan tombol 'LOG IN'.
                ->assertPathIs('/dashboard') // Memastikan setelah login, berada di '/dashboard'.
                ->assertSee('Dashboard') // Memastikan teks 'Dashboard' terlihat.
                ->clickLink('Notes') // Mengklik link 'Notes'.
                ->assertPathIs('/notes') // Memastikan berada di halaman '/notes'.
                ->assertSee('Notes') // Memastikan teks 'Notes' terlihat.
                ->clickLink('Create Note') // Mengklik link 'Create Note'.
                ->assertPathIs('/create-note') // Memastikan berada di halaman '/create-note'.
                ->assertSee('Notes / Create Note') // Memastikan breadcrumb atau judul halaman sesuai.
                ->type('title', 'Edit') // Mengisi judul catatan dengan 'Edit'.
                ->type('description', 'edit') // Mengisi deskripsi catatan dengan 'edit'.
                ->press('CREATE') // Memastikan tombol yang ditekan adalah "CREATE".
                ->assertPathIs('/notes') // Memastikan kembali ke halaman '/notes'.
                ->assertSee('new note has been created') // Memastikan pesan sukses muncul.
                ->assertSee('Edit') // Memastikan judul yang baru dibuat muncul di halaman.
                ->assertSee('edit'); // Memastikan isi catatan yang baru dibuat muncul di halaman.
        });
    }
}
