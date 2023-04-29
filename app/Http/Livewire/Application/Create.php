<?php

namespace App\Http\Livewire\Application;

use App\Models\Application;
use Closure;
use Filament\Forms;
use App\Models\Platform;
use App\Models\Vendor;
use App\Models\DevGovt;
use Livewire\Component;
use App\Models\Developer;
use App\Models\Usage;
use App\Models\ServiceType;
use App\Models\DataLocation;
use Exception;
use Illuminate\Contracts\View\View;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;

class Create extends Component implements HasForms
{
  use InteractsWithForms;

  public $title;
  public $content;

  public function mount(): void
  {
    $this->form->fill();
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
      Forms\Components\Select::make('usage_id')
        ->label('Penggunaan')
        ->options(Usage::all()->pluck('name', 'id'))
        ->required()
        ->helperText('Penggunaan aplikasi apakah umum digunakan/khusus'),
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
      Forms\Components\Select::make('platform_id')
        ->label('Platform')
        ->options(Platform::all()->pluck('name', 'id'))
        ->required(),
      Forms\Components\Select::make('data_location_id')
        ->label('Lokasi Data')
        ->options(DataLocation::all()->pluck('name', 'id'))
        ->required(),
      Forms\Components\Select::make('service_type_id')
        ->label('Layanan')
        ->options(ServiceType::all()->pluck('name', 'id'))
        ->required(),
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
        ->default(true)
        ->required(),
    ];
  }

  public function create()
  {
    $this->submit();
    return redirect()->route('application.index');
  }

  public function createAndAttach()
  {
    // dapatkan id aplk & web yang sudah diinput, untuk 
    $id = $this->submit();
    return redirect()->route('application.attachOrganization', ['application' => $id]);
  }

  protected function submit()
  {
    $data = $this->form->getState();
    try {
      $data['user_id'] = auth()->id();
      $app = Application::create($data);

      Notification::make()
        ->title('Penyimpanan sukses')
        ->body('Aplikasi & Web berhasil disimpan')
        ->success()
        ->send();

      return $app->id;
    } catch (\Exception $e) {
      Notification::make()
        ->title('Penyimpanan gagal')
        ->body($e->getMessage())
        ->danger()
        ->send();
      return;
    }
  }


  public function render(): View
  {

    return view('livewire.application.create');
  }
}
