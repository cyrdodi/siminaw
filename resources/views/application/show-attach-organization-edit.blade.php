<x-layout>
  <x-breadcrumb :homePage="['name' => 'Aplikasi & Web', 'route' => route('application.index')]" :links="[
      ['route' => route('application.show', $application), 'name' => 'Detail'],
      ['route' => route('application.show.attachOrganization', $application->id), 'name' => 'Tambah Organisasi (OPD)'],
    ]" currentPage="Edit Detail Organisasi" />

  <x-heading.h4 class="mb-4">Edit Detail Organisasi</x-heading.h4>

  <livewire:application.attach-organization-edit :application="$application" :organization="$organization" />
</x-layout>