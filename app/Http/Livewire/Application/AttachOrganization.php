<?php

namespace App\Http\Livewire\Application;

use Livewire\Component;
use App\Models\Application;
use App\Models\Organization;
use Filament\Forms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;

class AttachOrganization extends Component implements HasForms
{
  use InteractsWithForms;

  public $application;

  public $organization_id;
  public $detail;

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
        ->required(),

    ];
  }

  public function create()
  {
    $organization = $this->form->getState();

    $this->application->organizations()->attach($organization['organization_id'], ['detail' => json_encode($organization['detail'])]);
  }

  public function render()
  {
    return view('livewire.application.attach-organization');
  }
}
