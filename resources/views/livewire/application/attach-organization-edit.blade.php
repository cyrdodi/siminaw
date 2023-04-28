<div class="w-1/2">
  <form wire:submit.prevent="update">
    {{ $this->form }}
    <x-button type="submit">Update</x-button>
  </form>
</div>