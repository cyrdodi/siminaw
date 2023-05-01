<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevGovtController extends Controller
{
  public function index()
  {
    return view('dev-govt.index');
  }

  public function create()
  {
    return view('dev-govt.create');
  }
}
