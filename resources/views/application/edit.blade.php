<x-layout>
  <x-breadcrumb :homePage="['name' => 'Aplikasi & Web', 'route' => route('application.index')]"
    :links="[['route' => route('application.show', $application->id), 'name' => 'Detail']]" currentPage="Edit" />
  <x-heading.h4>Edit Aplikasi & Web</x-heading.h4>

  <livewire:application.application-edit :application="$application" />
</x-layout>