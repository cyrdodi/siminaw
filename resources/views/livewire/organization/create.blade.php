<div>
  <x-card>
    <form wire:submit.prevent="submit">
      {{ $this->form }}
      <x-button type="submit" class="mt-4">Simpan</x-button>
    </form>
  </x-card>
</div>