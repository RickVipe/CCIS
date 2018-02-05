<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Coordinador;
use App\Alumno;
class AlumnoTest extends TestCase
{
  

  /**
   *
   * @group ListStudent
   */

  public function testIndexStudent()
  {
    $coord = Coordinador::All()->last();

    $this ->actingAs($coord)
          ->get('/menucoordinadores/alumnos')
          ->assertStatus(200);


  }
  /** @group EditStudent*/
  public function testEditStudent()
  {
    $coord = Coordinador::All()->last();
    $alumn = Alumno::All()->last();
    echo "'/menucoordinadores/alumnos/{$alumn->id}/edit'";
    $this ->actingAs($coord)
          ->post('/menucoordinadores/alumnos/{$alumn->id}/edit')
          ->response
          ->getContent();
          #->assertStatus(200);
  }
}
//