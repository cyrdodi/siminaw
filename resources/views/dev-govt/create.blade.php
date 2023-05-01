<x-layout>
  <x-breadcrumb :homePage="['name' => 'Pengembang Pusat/K/L', 'route' => route('devGovt')]" currentPage="Input" />
  <x-heading.h4 class="mb-4">Pengembang Pusat/K/L Baru</x-heading.h4>

  <livewire:dev-govt.create />
</x-layout>