<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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

  public function attachOrganizationEdit(Application $application, Organization $organization)
  {
    return view('application/attach-organization-edit', compact('application', 'organization'));
  }

  public function show(Application $application)
  {
    return view('application/show', compact('application'));
  }
}
