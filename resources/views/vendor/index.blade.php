<x-layout>
  <x-breadcrumb :homePage="['name' => 'Organisasi', 'route' => route('organization')]" />

  <div class="flex mb-4 items-center justify-between">
    <x-heading.h4>Vendor</x-heading.h4>
    <x-link class="" href="{{ route('vendor.create') }}">Vendor Baru</x-link>
  </div>

  <livewire:vendor.table />
</x-layout>