<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AlumnoTest extends TestCase
{
  

  /**
   *
   * @group view
   */

  public function testIndexStudent()
  {

    //Given a user
    $user = \App\Coordinador::all()->last();
    $user -> password = 'secret';
    //When he login
    $this -> actingAs($user)
          -> withSession(['foo' => 'bar'])
          -> get('/menucoordinadores/alumnos')
          -> assertSee('alumnos');


  }
}
//