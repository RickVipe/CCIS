<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AlumnoTest extends TestCase
{
  /**
   * A basic test example.
   *
   * @return void
   */
  public function testExample()
  {
      $this->assertTrue(true);
  }

  /**
   *
   * @group view
   */

  public function testIndexStudent()
  {
      $this->visit('/alumnos')
         ->see('ALUMNO Login')
         ->dontSee('Something went wrong!');
  }
}
