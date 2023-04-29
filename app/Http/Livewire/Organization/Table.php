<?php

namespace App\Http\Livewire\Organization;

use Livewire\Component;
use App\Models\Organization;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Concerns\InteractsWithTable;

class Table extends Component implements HasTable
{
  use InteractsWithTable;

  protected function getTableQuery(): Builder
  {
    return Organization::withTrashed();
  }

  protected function getTableColumns(): array
  {
    return [
      TextColumn::make('name'),
      TextColumn::make('acronym')
        ->label('Akronim'),
      TextColumn::make('address')
        ->label('Alamat')
    ];
  }

  protected function getTableActions(): array
  {
    return [
      Action::make('Edit')
        ->action(function (Organization $record, array $data) {
          $record->update($data);
          Notification::make()
            ->title('Update berhasil')
            ->success()
            ->send();
        })
        ->mountUsing(fn (ComponentContainer $form, Organization $record) => $form->fill(['name' => $record->name, 'acronym' => $record->acronym, 'address' => $record->address]))
        ->form([
          TextInput::make('name')
            ->required(),
          TextInput::make('acronym'),
          Textarea::make('address')
        ]),
      Action::make('delete')
        ->action(fn (Organization $record) => $record->delete())
        ->color('danger')
        ->icon('heroicon-o-trash')
        ->requiresConfirmation()
        ->hidden(fn (Organization $record) => $record->trashed()),
      Action::make('forceDelete')
        ->action(fn (Organization $record) => $record->forceDelete())
        ->color('danger')
        ->icon('heroicon-o-trash')
        ->requiresConfirmation()
        ->hidden(fn (Organization $record) => !$record->trashed()),
      Action::make('restore')
        ->action(fn (Organization $record) => $record->restore())
        ->color('warning')
        ->icon('heroicon-o-refresh')
        ->hidden(fn (Organization $record) => !$record->trashed()),
    ];
  }

  protected function getTablefilters(): array
  {
    return [
      TernaryFilter::make('trashed')
        ->placeholder('Tanpa data arsip')
        ->trueLabel('Dengan data arsip')
        ->falseLabel('Hanya data arsip')
        ->queries(
          true: fn (Builder $query) => $query->withTrashed(),
          false: fn (Builder $query) => $query->onlyTrashed(),
          blank: fn (Builder $query) => $query->withoutTrashed(),
        )
    ];
  }

  public function render()
  {
    return view('livewire.organization.table');
  }
}
