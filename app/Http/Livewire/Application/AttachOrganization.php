<?php

namespace App\Http\Livewire\Application;

use Livewire\Component;
use App\Models\Application;
use App\Models\Organization;
use Filament\Forms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;

class AttachOrganization extends Component implements HasForms
{
  use InteractsWithForms;

  public $application;
  public $organizations;

  public $organization_id;
  public $detail;

  // refresh component
  protected $listeners = ['refreshComponent' => '$refresh'];

  public function mount(Application $application)
  {
    $this->application  = $application;
  }

  protected  function getFormSchema(): array
  {
    return [
      Forms\Components\Select::make('organization_id')
        ->options(Organization::all()->pluck('name', 'id'))
        ->searchable()
        ->required()
        ->label('Organisasi Perangkat Daerah'),
      Forms\Components\Repeater::make('detail')
        ->schema([
          Forms\Components\TextInput::make('name')
            ->label('Nama Person in Charge (PIC)')
            ->required(),
          Forms\Components\TextInput::make('jabatan'),
          Forms\Components\TextInput::make('no_hp'),
        ])
        ->defaultItems(1)
        ->required(),

    ];
  }

  public function create()
  {
    $organization = $this->form->getState();
    try {

      $this->application->organizations()->attach($organization['organization_id'], ['detail' => json_encode($organization['detail'])]);

      Notification::make()
        ->success()
        ->title('Sukses menambahkan organisasi ke aplikasi')
        ->send();
      redirect()->route('application.attachOrganization', $this->application->id);
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
