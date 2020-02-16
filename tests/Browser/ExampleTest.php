<?php

namespace Tests\Browser;
namespace App;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {

        $user = factory(User::class)->create([
            'email' => 'tester@fiit.sk',
            'user_type_id' => '6'
        ]);

        $this->browse(function ($browser) use ($user) {

            $browser->visit('/')
                    ->assertSee('Dilema');

            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/activities/show');
                    // ->assertSee('Zoznam ');

            // $browser->loginAs(User::find(1))
            //         ->visit('/activities/show')
            //         ->assertSee('Zoznam vzdelávacích aktivít');

        });

        $user->forceDelete();
    }
}
