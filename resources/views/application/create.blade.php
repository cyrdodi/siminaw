<x-layout>
  <x-breadcrumb :homePage="['name' => 'Aplikasi & Web', 'route' => route('application.index')]" currentPage="Input" />
  <x-heading.h4 class="mb-4">Aplikasi & Web Baru</x-heading.h4>
  <livewire:application.create />
</x-layout>