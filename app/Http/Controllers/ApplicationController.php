<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Filament\Notifications\Notification;

class ApplicationController extends Controller
{
  public function index()
  {
    return view('application.index');
  }

  public function create()
  {
    return view('application.create');
  }

  public function attachOrganization(Application $application)
  {
    return view('application.attach-organization', compact('application'));
  }

  public function attachOrganizationEdit(Application $application, Organization $organization)
  {
    return view('application.attach-organization-edit', compact('application', 'organization'));
  }

  public function show(Application $application)
  {
    return view('application.show', compact('application'));
  }

  public function showAttachOrganization(Application $application)
  {
    return view('application.show-attach-organization', compact('application'));
  }

  public function showAttachOrganizationEdit(Application $application, Organization $organization)
  {
    return view('application.show-attach-organization-edit', compact('application', 'organization'));
  }

  public function edit(Application $application)
  {
    return view('application.edit', compact('application'));
  }

  public function delete(Application $application)
  {
    try {

      $application->organizations()->detach();
      $application->delete();

      Notification::make()
        ->title('Aplikasi dan Website berhasil dihapus')
        ->success()
        ->send();

      return redirect()->route('application.index');
    } catch (\Exception $e) {

      Notification::make()
        ->title('Aplikasi dan Website gagal dihapus')
        ->body($e->getMessage())
        ->danger()
        ->send();
    }
  }
}
