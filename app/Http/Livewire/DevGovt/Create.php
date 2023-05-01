<?php

namespace App\Http\Livewire\DevGovt;

use App\Models\DevGovt;
use Livewire\Component;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Concerns\InteractsWithForms;

class Create extends Component implements HasForms
{
  use InteractsWithForms;


  public function mount()
  {
    $this->form->fill();
  }

  protected function getFormSchema(): array
  {
    return [
      TextInput::make('name')
        ->required(),
      Textarea::make('address')
        ->required(),
      TextInput::make('website')
        ->url(),
      Repeater::make('contacts')
        ->schema([
          TextInput::make('name'),
          TextInput::make('no_hp'),
          TextInput::make('email')
        ]),
      Textarea::make('details')
    ];
  }

  public function submit()
  {
    try {
      DevGovt::create($this->form->getState());
      Notification::make()
        ->title('Pengembang Pusat/K/L berhasil disimpan')
        ->body(' berhasil disimpan')
        ->success()
        ->send();

      return redirect()->route('devGovt');
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
    return view('livewire.dev-govt.create');
  }
}
