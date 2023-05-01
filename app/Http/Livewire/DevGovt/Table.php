<?php

namespace App\Http\Livewire\DevGovt;

use App\Models\DevGovt;
use Livewire\Component;
use Filament\Tables\Actions\Action;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Concerns\InteractsWithTable;
use Illuminate\Database\Eloquent\Relations\Relation;

class Table extends Component implements HasTable
{
  use InteractsWithTable;

  protected function getTableQuery(): Builder|Relation
  {
    return DevGovt::withTrashed();
  }

  protected function getTableColumns(): array
  {
    return [
      TextColumn::make('name'),
      TextColumn::make('address')
        ->label('Alamat'),
      TextColumn::make('website'),
      // TextColumn::make('contacts')
      // ->formatStateUsing(fn ($record) =>dd $record),
      ViewColumn::make('contacts')
        ->view('dev-govt.contacts-column'),
      TextColumn::make('details')
    ];
  }


  protected function getTableActions(): array
  {
    return [
      Action::make('Edit')
        ->action(function (DevGovt $record, array $data) {
          $record->update($data);
          Notification::make()
            ->title('Update berhasil')
            ->success()
            ->send();
        })
        ->mountUsing(fn (ComponentContainer $form, DevGovt $record) => $form->fill(['name' => $record->name, 'address' => $record->address, 'website' => $record->website, 'contacts' => $record->contacts, 'details' => $record->details]))
        ->form([
          TextInput::make('name')
            ->required(),
          Repeater::make('contacts')
            ->schema([
              TextInput::make('name'),
              TextInput::make('email'),
              TextInput::make('no_hp')
            ]),
          Textarea::make('address')
        ]),
      Action::make('delete')
        ->action(fn (DevGovt $record) => $record->delete())
        ->color('danger')
        ->icon('heroicon-o-trash')
        ->requiresConfirmation()
        ->hidden(fn (DevGovt $record) => $record->trashed()),
      Action::make('forceDelete')
        ->action(fn (DevGovt $record) => $record->forceDelete())
        ->color('danger')
        ->icon('heroicon-o-trash')
        ->requiresConfirmation()
        ->hidden(fn (DevGovt $record) => !$record->trashed()),
      Action::make('restore')
        ->action(fn (DevGovt $record) => $record->restore())
        ->color('warning')
        ->icon('heroicon-o-refresh')
        ->hidden(fn (DevGovt $record) => !$record->trashed()),
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
    return view('livewire.dev-govt.table');
  }
}
