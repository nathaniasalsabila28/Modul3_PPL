<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNotesTest extends DuskTestCase
{
    
    public function testEditNoteFlow(): void
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
                ->clickLink('Notes') //  Klik link 'Notes'.
                ->assertPathIs('/notes') // Memastikan berada di halaman '/notes'.
                ->assertSee('Notes'); //  Memastikan teks 'Notes' terlihat.

            $browser->click("a[dusk^='edit-']", 'Edit') // Mencari dan mengklik link 'Edit' untuk catatan pertama.
                ->assertSee('Notes / Edit Note'); // Memastikan kita berada di halaman edit note.
            $newTitle = 'Edit'; //  Mengubah judul catatan.
            $browser->type('title', $newTitle) // Mengubah deskripsi catatan.
                ->type('description', 'edit') // Menekan tombol 'Update'.
                ->press('UPDATE') // Memastikan kita kembali ke halaman '/notes'.
                ->assertPathIs('/notes') // Memastikan pesan sukses update muncul.
                ->assertSee('Note has been updated') //  Memastikan judul yang baru diupdate terlihat.
                ->assertSee($newTitle) // Memastikan isi yang baru diupdate terlihat.
                ->assertSee('edit');
        });
    }
}
