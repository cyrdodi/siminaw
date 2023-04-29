<div>
  <form wire:submit.prevent="update">
    {{ $this->form }}
    <x-button type="submit">Update</x-button>
  </form>
</div>