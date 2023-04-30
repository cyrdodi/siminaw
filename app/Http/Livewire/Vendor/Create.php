<?php

namespace App\Http\Livewire\Vendor;

use App\Models\Vendor;
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
      Vendor::create($this->form->getState());
      Notification::make()
        ->title('Vendor berhasil disimpan')
        ->body(' berhasil disimpan')
        ->success()
        ->send();

      return redirect()->route('vendor');
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
    return view('livewire.vendor.create');
  }
}
