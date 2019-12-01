<?php

namespace Tests\Feature;
namespace App;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PBExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        //Authorization TEST
    	$response = $this->json('GET', '/events/show');
    	// $response = $this->get('/events/show'); //-> 302 problem

    	//THIS CALL SHOULD RETURN 401 AS ONLY AUTHORIZED USERS SHOULD BE ABLE TO SEE LIST OF EVENTS
        $response
            ->assertStatus(401);

		//EVEN UNATHORIZED, I SHOULD SEE HOMEPAGE           
        $response = $this->json('GET', '/');
        $response
        	->assertStatus(200)
        	->assertSee('Dilema')
        	->assertSee('Prihlásenie')
        	->assertSee('Registrácia');

        $user = factory(User::class)->create([
        	'email'=>'tester@fiit.sk',
        	'user_type_id'=>'6'
        ]);

        $this->assertDatabaseHas('users', [
	        'email' => 'tester@fiit.sk',
	        'user_type_id' => '6'
	    ]);

        $response = $this->actingAs($user)
                         ->get('/');
        $response
        	->assertStatus(200)
        	->assertSee('Dashboard')
             ->assertDontSee('Prihlásenie');

        $response = $this->actingAs($user)
                         ->get('/activities/show');
        $response
        	->assertStatus(200)
        	->assertSee('Zoznam vzdelávacích aktivít');

        $user->forceDelete();

        //./vendor/bin/phpunit tests/Feature/PBExampleTest.php 

    }



}


