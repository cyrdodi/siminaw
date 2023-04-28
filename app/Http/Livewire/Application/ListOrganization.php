<?php

namespace App\Http\Livewire\Application;

use App\Models\Application;
use Livewire\Component;

class ListOrganization extends Component
{

  public Application $application;


  // refresh component
  protected $listeners = ['refreshComponent' => '$refresh'];

  public function delete($organizationId)
  {

    try {
      $this->application->organizations()->detach($organizationId);
      $this->emit('refreshComponent');
    } catch (\Exception $e) {
    }
  }

  public function render()
  {
    return view('livewire.application.list-organization');
  }
}
