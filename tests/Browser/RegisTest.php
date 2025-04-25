<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testRegis(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') //mengunjungi halaman utama
                    ->assertSee('Modul 3') //melihat tulisan modul 3
                    ->clickLink(link: 'Register') //menekan tautan register
                    ->assertPathIs(path: '/register') //memastikan pathnya /register
                    ->type('name', 'admin') //mengisi input admin
                    ->type('email','admin@gmail.com') // mengisi input email
                    ->type('password','123456') // mengisi input password
                    ->type('password_confirmation','123456') //mengisi confirm password
                    ->press('REGISTER') //menekan button register
                    ->assertPathIs('‘/dashboard’'); //memastikan url mengarah ke dashboard
                    
        });
    }
}
