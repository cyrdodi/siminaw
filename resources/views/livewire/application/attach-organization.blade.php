<div>
  {{-- Success is as dangerous as failure. --}}
  <div class="grid grid-cols-2 gap-4">
    {{-- info and form --}}
    <div>
      <x-card>
        <h3 class="font-semibold text-4xl">{{ $application->name }}</h3>

        <p class="mt-4 text-gray-600">{{ $application->description }}</p>
      </x-card>

      <x-card>
        <form wire:submit.prevent="create">
          {{ $this->form }}

          <x-button type="submit">Submit</x-button>
        </form>
      </x-card>
    </div>

    {{-- list opd attached --}}
    <div>

    </div>
  </div>
</div>