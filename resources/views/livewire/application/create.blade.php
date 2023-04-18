<div>
  <x-card>
    <form wire:submit.prevent="create">
      {{ $this->form }}
      <x-button-outline class="mt-6">
        Submit
      </x-button-outline>
      <x-button class="mt-6">
        Submit & Tambahakan OPD
      </x-button>
    </form>
  </x-card>
</div>