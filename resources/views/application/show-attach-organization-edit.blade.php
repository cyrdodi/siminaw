<x-layout>
  <x-breadcrumb :homePage="['name' => 'Aplikasi & Web', 'route' => route('application.index')]" :links="[
      ['route' => route('application.show', $application), 'name' => 'Kontak'],
      ['route' => route('application.show.attachOrganization', $application->id), 'name' => 'Tambah Organisasi (OPD)'],
    ]" currentPage="Edit Kontak Organisasi" />

  <x-heading.h4 class="mb-4">Edit Kontak Organisasi</x-heading.h4>

  <livewire:application.attach-organization-edit :application="$application" :organization="$organization" />
</x-layout>