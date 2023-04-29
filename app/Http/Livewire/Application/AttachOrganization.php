<?php

namespace App\Http\Livewire\Application;

use Filament\Forms;
use Livewire\Component;
use App\Models\Application;
use App\Models\Organization;
use Illuminate\Support\Facades\DB;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Forms\Concerns\InteractsWithForms;

class AttachOrganization extends Component implements HasForms
{
  use InteractsWithForms;

  public $application;
  public $organizations;

  public $organization_id;
  public $contacts;

  public $currentRoute;

  // refresh component
  protected $listeners = ['refreshComponent' => '$refresh'];

  public function mount(Application $application)
  {
    $this->currentRoute = request()->route()->getName();
    $this->application  = $application;
    $this->form->fill();
  }

  protected  function getFormSchema(): array
  {
    return [
      Forms\Components\Select::make('organization_id')
        // ->options(Organization::all()->pluck('name', 'id'))
        ->options(function () {
          $existingOrganizations = DB::table('application_organization')
            ->select('organization_id')
            ->where('application_id', $this->application->id)
            ->distinct()
            ->pluck('organization_id')
            ->toArray();

          $organizations = Organization::whereNotIn('id', $existingOrganizations)
            ->pluck('name', 'id');
          return $organizations;
        })
        ->searchable()
        ->required()
        ->label('Organisasi Perangkat Daerah'),
      Forms\Components\Repeater::make('contacts')
        ->schema([
          Forms\Components\TextInput::make('name')
            ->label('Nama Person in Charge (PIC)')
            ->required(),
          Forms\Components\TextInput::make('jabatan'),
          Forms\Components\TextInput::make('no_hp'),
        ])
        ->defaultItems(1)
        ->minItems(1)
        ->required()
        ->createItemButtonLabel('Tambah Kontak PIC'),

    ];
  }

  public function create()
  {
    $organization = $this->form->getState();
    try {

      $this->application->organizations()->attach($organization['organization_id'], ['contacts' => json_encode($organization['contacts'])]);

      Notification::make()
        ->success()
        ->title('Sukses menambahkan organisasi ke aplikasi')
        ->send();

      redirect()->route($this->currentRoute, $this->application->id);
      // $this->form->fill([]);
      $this->emit('refreshComponent');
    } catch (\Exception $e) {
      Notification::make()
        ->title('Gagal')
        ->body($e->getMessage())
        ->danger()
        ->send();
    }
  }

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
    return view('livewire.application.attach-organization');
  }
}
