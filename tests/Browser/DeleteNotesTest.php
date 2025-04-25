<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteNotesTest extends DuskTestCase
{
   
    public function testDeleteNoteFlow(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // Halaman utama aplikasi
                ->assertSee('Modul 3') // memastikan 'Modul 3' muncul di halaman utama
                ->clickLink('Log in') // Klik link 'Log in' untuk login
                ->assertPathIs('/login') // Pastikan kita berada di halaman login
                ->type('email', 'admin@gmail.com') // Isi email dengan admin
                ->type('password', '123456') // Isi password dengan 123456
                ->press('LOG IN') // Klik tombol 'LOG IN' untuk login
                ->assertPathIs('/dashboard') // Pastikan diarahkan ke dashboard setelah login
                ->assertSee('Dashboard') // Pastikan 'Dashboard' terlihat di halaman
                ->clickLink('Notes') // Klik link 'Notes' untuk menuju halaman notes
                ->assertPathIs('/notes') // Pastikan berada di halaman '/notes'
                ->assertSee('Notes'); // Pastikan teks 'Notes' muncul di halaman
            $browser->press('Delete') // Klik tombol 'Delete' untuk menghapus catatan
                ->assertSee('Note has been deleted'); // Pastikan muncul pesan 'Note has been deleted'
        });
    }
}
