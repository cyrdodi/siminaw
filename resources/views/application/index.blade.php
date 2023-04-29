<x-layout>

  <x-breadcrumb :homePage="['name' => 'Aplikasi & Web', 'route' => route('application.index')]" />

  <x-link class="mb-8" href="{{ route('application.create') }}">Aplikasi & Web Baru</x-link>

  <div class="pt-8">

    <livewire:application.table />
  </div>
</x-layout>