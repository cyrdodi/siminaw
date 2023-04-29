<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebMonitorController extends Controller
{
  public function index()
  {
    return view('web-monitor.index');
  }
}
