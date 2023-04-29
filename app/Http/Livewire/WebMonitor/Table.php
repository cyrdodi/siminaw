<?php

namespace App\Http\Livewire\WebMonitor;

use Filament\Tables;
use Livewire\Component;
use App\Models\Application;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Concerns\InteractsWithTable;
use Illuminate\Database\Eloquent\Model;

class Table extends Component implements HasTable
{
  use InteractsWithTable;

  public function getTableQuery(): Builder
  {
    return  Application::where('url', '!=', '');
  }

  public function getTableColumns(): array
  {
    return [
      TextColumn::make('name'),
      TextColumn::make('url'),
      // ViewColumn::make('status')->view('web-monitor.status')
      TextColumn::make('status')
        ->getStateUsing(function (Model $record) {
          return $this->checkStatus($record->url) ? 'Online' : 'Offline';
        }),

    ];
  }

  protected function checkStatus($url)
  {
    $headers = @get_headers($url);
    if ($headers && strpos($headers[0], '200')) {
      return true;
    } else {
      return false;
    }
  }

  public function render()
  {
    return view('livewire.web-monitor.table');
  }
}
