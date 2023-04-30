<x-layout>
  <x-breadcrumb :homePage="['name' => 'Vendor', 'route' => route('vendor')]" currentPage="Input" />
  <x-heading.h4 class="mb-4">Vendor Baru</x-heading.h4>

  <livewire:vendor.create />
</x-layout>