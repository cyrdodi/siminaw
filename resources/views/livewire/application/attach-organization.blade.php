<div>
  {{-- Success is as dangerous as failure. --}}
  <div class="grid grid-cols-2 gap-4">
    {{-- info and form --}}
    <div>
      <x-card>
        <h3 class="font-semibold text-4xl">{{ $application->name }}</h3>

        <p class="mt-4 text-gray-600">{{ $application->description }}</p>
      </x-card>

      <x-card class="mt-8">
        <form wire:submit.prevent="create">
          {{ $this->form }}

          <x-button type="submit">Submit</x-button>
        </form>
      </x-card>
    </div>

    {{-- list opd attached --}}
    <div>
      <x-card>
        <h1 class="mb-8">Organisasi yang menggunakan aplikasi ini </h1>

        <form>
          <x-search-input label="Cari" name="search" placeholder="Cari Organisasi Perangkat Daerah..." />
        </form>

        <div class="mt-8">
          @foreach($organizations as $organization)
          <div class="border border-gray-200 rounded-lg p-3 mb-4">
            <h3 class="font-semibold text-lg mb-4">{{ $organization->name }}</h3>
            @foreach(json_decode($organization->pivot->detail) as $detail)
            <div class="border rounded-lg p-2 mb-2">
              <table>
                <tr>
                  <td class="w-[158px]">Name</td>
                  <td>{{ $detail->name }}</td>
                </tr>
                <tr>
                  <td>Jabatan</td>
                  <td>{{ $detail->jabatan }}</td>
                </tr>
                <tr>
                  <td>No. Handphone</td>
                  <td>{{ $detail->no_hp }}</td>
                </tr>
              </table>

            </div>
            @endforeach
          </div>
          @endforeach
        </div>
      </x-card>
    </div>
  </div>
</div>