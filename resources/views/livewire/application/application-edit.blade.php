<div>
  <x-card class="mt-4">

    <form wire:submit.prevent="update">
      {{ $this->form }}
      <x-button type="submit" class="mt-4">Update</x-button>
    </form>
  </x-card>
</div>