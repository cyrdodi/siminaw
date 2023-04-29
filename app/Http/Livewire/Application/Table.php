<?php

namespace App\Http\Livewire\Application;

use App\Models\Platform;
use Livewire\Component;
use App\Models\Application;
use App\Models\Organization;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Concerns\InteractsWithTable;
// use Filament

class Table extends Component implements HasTable
{

  use InteractsWithTable;

  protected function getTableQuery(): Builder
  {
    return Application::where('is_active', true);
  }

  protected function getTableColumns(): array
  {
    return [
      TextColumn::make('name')
        ->searchable(),
      TextColumn::make('description')
        ->searchable(),
      TextColumn::make('usage.name'),
      TextColumn::make('platform.name'),
      TextColumn::make('serviceType.name'),
      TagsColumn::make('technologies')
    ];
  }

  protected function getTableActions(): array
  {
    return [
      Action::make('Detail')
        ->url(fn (Application $record): string => route('application.show', $record->id)),
    ];
  }

  protected function getTableFilters(): array
  {
    return [
      Filter::make('not_active')
        ->query(fn (Builder $query): Builder => $query->where('is_active', false))
        ->toggle()
        ->label('Tidak Aktif'),
      SelectFilter::make('platform_id')
        ->options(Platform::all()->pluck('name', 'id'))
        ->multiple(),
      SelectFilter::make('organizations')
        ->options(Organization::all()->pluck('name', 'id'))
        ->attribute('organizations.organization_id')
        ->searchable(),
    ];
  }

  public function isTableSearchable(): bool
  {
    return true;
  }

  public function render()
  {
    return view('livewire.application.table');
  }
}
