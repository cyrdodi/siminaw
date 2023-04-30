<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorController extends Controller
{
  public function index()
  {
    return view('vendor.index');
  }

  public function create()
  {
    return view('vendor.create');
  }
}
