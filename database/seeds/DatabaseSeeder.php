<?php

use Illuminate\Database\Seeder;
use App\Disciplina;
use App\Categoria;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //  REGISTA admin
    // $ep= new Disciplina;
    // $ep->designacao = 'Inovacao do Negocio';
    //
    // $ep->save();
    //
    // //
    // //   //user Seeder
    $user = Sentinel::registerAndActivate([
      'email'      => 'admin@admin.com',
      'password'   => 'admin',
      'permissions' =>  [' '],
      'last_login' =>  ' ',
      'first_name' => 'opentima',
      'last_name'  => 'Administrador',
      'last_login' =>   Carbon::now(),
    ]);

    $role = Sentinel::findRoleBySlug('administrador');
    $role->users()->attach($user);
    // //
    // //
    // //
    // // //registar categorias de duvidas
    // //
    $categoria_1 = new Categoria;
    $categoria_1->designacao = 'Inovation';
    $categoria_1->descricao  = 'Inovation';
    $categoria_1->save();

    $categoria_2 = new Categoria;
    $categoria_2->designacao = 'Blockchain';
    $categoria_2->descricao  = 'Blockchain';
    $categoria_2->save();
    //
    // $categoria_1 = new Categoria;
    // $categoria_1->designacao = 'Outras';
    // $categoria_1->descricao  = 'Duvida virada a uma area de actuação';
    // $categoria_1->save();

  }
}
