<x-layout>

  <x-breadcrumb :homePage="['name' => 'Aplikasi & Web', 'route' => route('application.index')]" />

  <div class="flex mb-4 items-center justify-between">
    <x-heading.h4>Aplikasi & Website</x-heading.h4>
    <x-link class="" href="{{ route('application.create') }}">Aplikasi & Web Baru</x-link>
  </div>

  <div class="">
    <livewire:application.table />
  </div>
</x-layout>