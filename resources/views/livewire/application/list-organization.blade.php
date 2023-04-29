<div class="w-2/3">
  <x-card>
    <h1 class="mb-8">Organisasi yang menggunakan aplikasi ini </h1>

    <form>
      <x-search-input label="Cari" name="search" placeholder="Cari Organisasi Perangkat Daerah..." />
    </form>

    <div class="mt-8">
      @foreach($application->organizations as $organization)
      <div class="border border-gray-200 rounded-lg p-3 mb-4">
        <div class="flex items-center justify-between flex-1 mb-4">

          <h3 class="font-semibold text-lg ">{{ $organization->name }}</h3>

          <div>
            <x-link
              :href="request()->routeIs('*show*') ? route('application.show.attachOrganization.edit', [$application, $organization]) : route('application.attachOrganization.edit', [$application, $organization])">
              Edit
            </x-link>
            <button wire:click="delete({{ $organization->id }})"
              class="px-3 py-2 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 ">Delete</button>
          </div>
        </div>
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