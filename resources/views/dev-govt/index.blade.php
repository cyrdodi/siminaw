<x-layout>
  <x-breadcrumb :homePage="['name' => 'Pengembang Pusat/K/L', 'route' => route('devGovt')]" />

  <div class="flex mb-4 items-center justify-between">
    <x-heading.h4>Pengembang Pusat/K/L</x-heading.h4>
    <x-link class="" href="{{ route('devGovt.create') }}">Pengembang Pusat/K/L Baru</x-link>
  </div>

  <livewire:dev-govt.table />
</x-layout>