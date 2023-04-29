<x-layout>
  <x-breadcrumb :homePage="['route' => route('webMonitor'), 'name' => 'Web Monitor']" />
  <x-heading.h4>Web Monitor</x-heading.h4>

  <livewire:web-monitor.table />
</x-layout>