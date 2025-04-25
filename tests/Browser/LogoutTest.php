<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogoutTest extends DuskTestCase
{

    public function testLogoutFlow(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // Mengunjungi halaman utama aplikasi.
                ->assertSee('Modul 3') // Memastikan teks 'Modul 3' ada di halaman.
                ->clickLink('Log in') // Mengklik link 'Log in'.
                ->assertPathIs('/login') // Memastikan berada di halaman '/login'.
                ->type('email', 'admin@gmail.com') // Mengisi email dengan 'admin@gmail.com'.
                ->type('password', '123456') //  Mengisi password dengan '123456'.
                ->press('LOG IN') //  Menekan tombol 'LOG IN'.
                ->assertPathIs('/dashboard') // Memastikan setelah login, berada di '/dashboard'.
                ->assertSee('Dashboard') // Memastikan teks 'Dashboard' terlihat.
                ->click('.relative')  // Klik dropdown user. Sesuaikan selector ini dengan dropdown user Anda
                ->clickLink('Log Out') // Klik link 'Log Out'.
                ->assertPathIs('/'); // Memastikan diarahkan ke halaman beranda setelah logout.
        });
    }
}
