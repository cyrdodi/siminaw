<?php

namespace App\Http\Livewire\Welcome;

use Livewire\Component;
use App\Models\Application;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;

class Table extends Component implements HasTable
{
  use InteractsWithTable;

  public $jmlAplikasi;
  public $jmlAplikasiUmum;
  public $jmlAplikasiKhusus;

  protected function getTableQuery()
  {
    return Application::where('is_active', true);
  }

  public function mount()
  {
    $this->jmlAplikasi = Application::where('is_active', 1)->count();
    $this->jmlAplikasiUmum = Application::where('is_active', 1)
      ->where('usage_id', 1)
      ->count();
    $this->jmlAplikasiKhusus = Application::where('is_active', 1)
      ->where('usage_id', 2)
      ->count();
  }

  protected function getTableColumns(): array
  {
    return [
      TextColumn::make('name')
        ->label('Nama')
        ->searchable(),
      TextColumn::make('description')
        ->label('Deskripsi')
        ->searchable(),
      TextColumn::make('usage.name')
        ->label('Penggunaan'),
      TextColumn::make('platform.name')
        ->label('platform'),
      TextColumn::make('serviceType.name')
        ->label('Jenis Layanan'),
      TextColumn::make('url')
        ->label('URL'),
      IconColumn::make('is_online')
        ->label('Online')
        ->options([
          'heroicon-o-x' => 0,
          'heroicon-o-check' => 1
        ]),
    ];
  }

  public function render()
  {
    return view('livewire.welcome.table');
  }
}
