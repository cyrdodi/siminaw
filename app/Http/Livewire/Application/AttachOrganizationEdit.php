<?php

namespace App\Http\Livewire\Application;

use App\Models\Application;
use App\Models\Organization;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;
use Filament\Forms;
use Filament\Notifications\Notification;
use Illuminate\Routing\Route;

class AttachOrganizationEdit extends Component implements HasForms
{
  use InteractsWithForms;

  public Application $application;
  public Organization $organization;
  public $currentRoute;

  public $organizationId;

  public function mount()
  {
    $this->currentRoute = request()->route()->getName();

    $contacts = $this->application->organizations()->wherePivot('organization_id', $this->organization->id)->first()->pivot;

    // dd(json_encode($detail->detail));

    $contacts = json_decode($contacts->contacts, true);

    $this->form->fill([
      'contacts' => $contacts
    ]);
  }

  protected function getFormSchema(): array
  {
    return [
      Forms\Components\Repeater::make('contacts')
        ->schema([
          Forms\Components\TextInput::make('name')
            ->label('Nama Person in Charge (PIC)')
            ->required(),
          Forms\Components\TextInput::make('jabatan'),
          Forms\Components\TextInput::make('no_hp'),
        ])
    ];
  }

  public function update()
  {
    $data = $this->form->getState();

    try {
      $this->application->organizations()->sync([$this->organization->id =>  ['contacts' => json_encode($data['contacts'])]]);
      Notification::make()
        ->title('Update berhasil')
        ->success()
        ->send();
      $route = strpos($this->currentRoute, 'show')  ?
        redirect()->route('application.show.attachOrganization', $this->application->id) :
        redirect()->route('application.attachOrganization', $this->application->id);

      // dd(request()->routeIs('application.show.attachOrganization.edit'));
      return $route;
    } catch (\Exception $e) {
      Notification::make()
        ->title('Update Gagal')
        ->body($e->getMessage())
        ->danger()
        ->send();
    }
  }



  public function render()
  {
    return view('livewire.application.attach-organization-edit');
  }
}
