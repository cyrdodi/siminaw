<?php

namespace App\Http\Livewire\Application;

use Closure;
use Filament\Forms;
use App\Models\Jenis;
use App\Models\Vendor;
use App\Models\DevGovt;
use Livewire\Component;
use App\Models\Developer;
use App\Models\Penggunaan;
use App\Models\Application;
use App\Models\ServiceType;
use App\Models\DataLocation;
use Forms\Components\TextInput;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Forms\Concerns\InteractsWithForms;

class ApplicationEdit extends Component implements HasForms
{
  use InteractsWithForms;

  public Application $application;

  public function mount()
  {
    $this->form->fill([
      'name' => $this->application->name,
      'description' => $this->application->description,
      'penggunaan_id' => $this->application->penggunaan_id,
      'jenis_id' => $this->application->jenis_id,
      'data_location_id' => $this->application->data_location_id,
      'service_type_id' => $this->application->service_type_id,
      'developer_id' => $this->application->developer_id,
      'vendor_id' => $this->application->vendor_id,
      'dev_govt_id' => $this->application->dev_govt_id,
      'technologies' => $this->application->technologies,
      'is_using_electronic_certificate' => $this->application->is_using_electronic_certificate,
      'electronic_certificate_name' => $this->application->electronic_certificate_name,
      'is_electronic_system_registered' => $this->application->is_electronic_system_registered,
      'is_integrated_with_central_govt' => $this->application->is_integrated_with_central_govt,
      'is_online' => $this->application->is_online,
      'is_active' => $this->application->is_active,
    ]);
  }

  protected function getFormSchema(): array
  {
    return [
      Forms\Components\TextInput::make('name')
        ->label('Nama Aplikasi/Web')
        ->required()
        ->maxLength(255),
      Forms\Components\Textarea::make('description')
        ->label('Deskripsi Aplikasi/Web')
        ->placeholder('Deskripsi/Fungsi aplikasi atau web')
        ->required()
        ->maxLength(65535),
      Forms\Components\Select::make('penggunaan_id')
        ->label('Penggunaan')
        ->options(Penggunaan::all()->pluck('name', 'id'))
        ->required()
        ->helperText('Penggunaan aplikasi apakah umum digunakan/khusus'),
      Forms\Components\Select::make('jenis_id')
        ->label('Jenis')
        ->options(Jenis::all()->pluck('name', 'id'))
        ->required(),
      Forms\Components\Select::make('data_location_id')
        ->label('Lokasi Data')
        ->options(DataLocation::all()->pluck('name', 'id'))
        ->required(),
      Forms\Components\Select::make('service_type_id')
        ->label('Layanan')
        ->options(ServiceType::all()->pluck('name', 'id'))
        ->required(),
      Forms\Components\Select::make('developer_id')
        ->label('Pengembang')
        ->options(Developer::all()->pluck('name', 'id'))
        ->required()
        ->reactive(),
      Forms\Components\Select::make('vendor_id')
        ->label('Vendor')
        ->options(Vendor::all()->pluck('name', 'id'))
        ->searchable()
        ->visible(fn (Closure $get) => $get('developer_id') == '2'),
      Forms\Components\Select::make('dev_govt_id')
        ->label('Pengembang Pusat/Kementrian/Lembaga')
        ->options(DevGovt::all()->pluck('name', 'id'))
        ->searchable()
        ->visible(fn (Closure $get) => $get('developer_id') == '3'),
      // Forms\Components\TextInput::make('user_id')
      //   ->required(),modelmodel
      Forms\Components\TagsInput::make('technologies')
        ->label('Teknologi')
        ->helperText('Tech Stack yang digunakan')
        ->required(),
      Forms\Components\TextInput::make('url')
        ->url()
        ->maxLength(255),
      Forms\Components\Toggle::make('is_using_electronic_certificate')
        ->label('Sertifikat Elektronik')
        ->helperText('Apakah menggunakan sertifikat elektronik')
        ->reactive(),
      Forms\Components\TextInput::make('electronic_certificate_name')
        ->label('Nama Sertifikat Elektronik')
        ->maxLength(255)
        ->visible(fn (Closure $get) => $get('is_using_electronic_certificate') === true),
      Forms\Components\Toggle::make('is_electronic_system_registered')
        ->label('Terdaftar di PSE'),
      Forms\Components\Toggle::make('is_integrated_with_central_govt')
        ->label('Terintegrasi dengan pusat'),
      Forms\Components\Toggle::make('is_online')
        ->label('Online')
        ->required(),
      Forms\Components\Toggle::make('is_active')
        ->required(),
    ];
  }

  public function update()
  {
    $data = $this->form->getState();

    try {
      // update record
      $this->application->update($data);

      Notification::make()
        ->title('Update berhasil')
        ->success()
        ->send();

      return redirect()->route('application.show', $this->application->id);
    } catch (Exception $e) {
      Notification::make()
        ->title('Update gagal')
        ->body($e->getMessage())
        ->danger()
        ->send();
    }
  }

  public function render()
  {
    return view('livewire.application.application-edit');
  }
}
