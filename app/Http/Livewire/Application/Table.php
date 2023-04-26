<?php

namespace App\Http\Livewire\Application;

use App\Models\Application;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Livewire\Component;
// use Filament

class Table extends Component implements HasTable
{

  use InteractsWithTable;

  protected function getTableQuery(): Builder
  {
    return Application::query();
  }

  protected function getTableColumns(): array
  {
    return [
      TextColumn::make('name'),
      TextColumn::make('description'),
      TextColumn::make('penggunaan.name'),
      TextColumn::make('jenis.name'),
      TextColumn::make('serviceType.name'),
      TagsColumn::make('technologies')
    ];
  }

  protected function getTableActions(): array
  {
    return [
      Action::make('detail')
        ->url(fn (Application $record): string => route('application.show', $record->id)),
    ];
  }

  public function render()
  {
    return view('livewire.application.table');
  }
}
