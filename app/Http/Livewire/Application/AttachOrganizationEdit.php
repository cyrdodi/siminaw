<?php

namespace App\Http\Livewire\Application;

use App\Models\Application;
use App\Models\Organization;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;
use Filament\Forms;
use Filament\Notifications\Notification;

class AttachOrganizationEdit extends Component implements HasForms
{
  use InteractsWithForms;

  public Application $application;
  public  Organization $organization;

  public $organizationId;

  public function mount()
  {
    $detail = $this->application->organizations()->wherePivot('organization_id', $this->organization->id)->first()->pivot;

    // dd(json_encode($detail->detail));

    $details = json_decode($detail->detail, true);

    $this->form->fill([
      'detail' => $details
    ]);
  }

  protected function getFormSchema(): array
  {
    return [
      Forms\Components\Repeater::make('detail')
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
    // dd($data['detail']);

    try {
      $this->application->organizations()->sync([$this->organization->id =>  ['detail' => json_encode($data['detail'])]]);
      Notification::make()
        ->title('Update berhasil')
        ->success()
        ->send();
      return redirect()->route('application.attachOrganization', $this->application->id);
    } catch (\Exception $e) {
      Notification::make()
        ->title('Update Gagal')
        ->content($e->getMessage())
        ->danger()
        ->send();
    }
  }



  public function render()
  {
    return view('livewire.application.attach-organization-edit');
  }
}
