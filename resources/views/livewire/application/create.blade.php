<div>
  <x-card class="xl:w-1/2">
    <form wire:submit.prevent="create">
      {{ $this->form }}
      <x-button-outline type="submit" class="mt-6">
        Submit
      </x-button-outline>
      <x-button type="button" class="mt-6" wire:click="createAndAttach">
        Submit & Tambahakan OPD
      </x-button>
    </form>
  </x-card>
</div>