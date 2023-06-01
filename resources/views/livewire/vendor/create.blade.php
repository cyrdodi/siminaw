<div>
  {{-- Close your eyes. Count to one. That is how long forever feels. --}}
  <x-card class="xl:w-1/2">
    <form wire:submit.prevent="submit">
      {{ $this->form }}
      <x-button type="submit" class="mt-4">Simpan</x-button>
    </form>
  </x-card>
</div>