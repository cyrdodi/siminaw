<x-layout>
  <x-breadcrumb :homePage="['name' => 'Aplikasi & Web', 'route' => route('application.index')]"
    :links="[['route' => route('application.create'), 'name' => 'Input']]" currentPage="Tambah Organisasi (OPD)" />
  <x-heading.h4 class="mb-4">Tambahkan Organisasi ke Aplikasi & Web</x-heading.h4>
  <div class="xl:flex xl:flex-1 w-full gap-3">
    <livewire:application.attach-organization :application="$application" />

    <livewire:application.list-organization :application="$application" />
  </div>
</x-layout>