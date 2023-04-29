<x-layout>
  <x-breadcrumb :homePage="['name' => 'Organisasi', 'route' => route('organization')]" />

  <div class="flex mb-4 items-center justify-between">
    <x-heading.h4>Organisasi (OPD)</x-heading.h4>
    <x-link class="" href="{{ route('organization.create') }}">Organisasi Baru</x-link>
  </div>

  <livewire:organization.table />
</x-layout>