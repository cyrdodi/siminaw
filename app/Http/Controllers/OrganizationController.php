<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizationController extends Controller
{
  public function index()
  {
    return view('organization.index');
  }

  public function create()
  {
    return view('organization.create');
  }
}
