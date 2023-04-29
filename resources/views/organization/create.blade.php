<x-layout>
  <x-breadcrumb :homePage="['name' => 'Organisasi', 'route' => route('organization')]" currentPage="Input" />
  <x-heading.h4 class="mb-4">Organisasi Baru</x-heading.h4>

  <livewire:organization.create />
</x-layout>