<?php

namespace App\Http\Livewire\Organization;

use Livewire\Component;
use App\Models\Organization;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;

class Create extends Component implements HasForms
{
  use InteractsWithForms;

  public function mount()
  {
    $this->form->fill();
  }

  public function getFormSchema(): array
  {
    return [
      TextInput::make('name')
        ->label('Nama Organisasi Perangakat Daerah')
        ->required(),
      TextInput::make('acronym')
        ->label('Akronim/Singkatan')
        ->required(),
      Textarea::make('address')
        ->label('Alamat'),
    ];
  }

  public function submit()
  {
    try {
      Organization::create($this->form->getState());

      Notification::make()
        ->title('Organisasi berhasil disimpan')
        ->body(' berhasil disimpan')
        ->success()
        ->send();

      return redirect()->route('organization');
    } catch (\Exception $e) {
      Notification::make()
        ->title('Gagal disimpan')
        ->body($e->getMessage())
        ->danger()
        ->send();
    }
  }

  public function render()
  {
    return view('livewire.organization.create');
  }
}
