<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DetailNotesTest extends DuskTestCase
{
    
    public function testDetailNoteFlow(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // Mengunjungi halaman utama aplikasi.
                ->assertSee('Modul 3') // Memastikan teks 'Modul 3' ada di halaman.
                ->clickLink('Log in') // Mengklik link 'Log in'.
                ->assertPathIs('/login') // Memastikan berada di halaman '/login'.
                ->type('email', 'admin@gmail.com') // Mengisi email dengan 'admin@gmail.com'.
                ->type('password', '123456') // Mengisi password dengan '123456'.
                ->press('LOG IN') // Menekan tombol 'LOG IN'.
                ->assertPathIs('/dashboard') // Memastikan setelah login, berada di '/dashboard'.
                ->assertSee('Dashboard') // Memastikan teks 'Dashboard' terlihat.
                ->clickLink('Notes') // Klik link 'Notes'.
                ->assertPathIs('/notes') // Memastikan berada di halaman '/notes'.
                ->assertSee('Notes'); // Memastikan teks 'Notes' terlihat.
            $browser->clickLink('Edit') // Mencari link detail catatan dan mengklik "Edit".
                ->assertSee('Notes / Edit') // Memastikan berada di halaman detail catatan.
                ->assertSee('Edit') //  Memastikan judul catatan yang benar terlihat.
                ->assertSee('Author: admin') // Memastikan nama penulis terlihat.
                ->assertSee('edit'); // Memastikan isi catatan terlihat.
        });
    }
}
