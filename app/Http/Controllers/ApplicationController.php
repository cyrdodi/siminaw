<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
  public function index()
  {
    return view('application/index');
  }

  public function create()
  {
    return view('application/create');
  }
}
