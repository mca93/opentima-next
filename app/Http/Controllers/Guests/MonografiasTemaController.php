<?php

namespace App\Http\Controllers\Guests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Monografia;

class MonografiasTemaController extends Controller
{
    public function monografias()
    {
      $monografias = Monografia::where('estado','=','Publica')->get();
      return view('guests.monografias.index')->withMonografias($monografias);
    }
}
