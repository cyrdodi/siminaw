<x-layout>

  <div class="flex flex-1 w-full gap-3">

    <livewire:application.attach-organization :application="$application" />

    <livewire:application.list-organization :application="$application" />
  </div>
</x-layout>