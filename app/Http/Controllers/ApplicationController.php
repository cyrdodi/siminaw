<?php

namespace App\Http\Controllers;

use App\Models\Application;
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

  public function attachOrganization(Application $application)
  {
    return view('application/attach-organization', compact('application'));
  }
}
