<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Departamento;

class HomeController extends Controller
{
  public function admin()
  {
    return view('administrador.home');
  }
}
