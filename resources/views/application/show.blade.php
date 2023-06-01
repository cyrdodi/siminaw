<x-layout>
  <x-breadcrumb :homePage="['name' => 'Aplikasi & Web', 'route' => route('application.index')]" currentPage="Detail" />
  <div class="flex justify-between items-center">

    <x-heading.h4 class="mb-4">Detail Aplikasi & Web</x-heading.h4>

    <x-link :href="route('application.edit', $application->id)">Edit</x-link>
  </div>

  <div class="grid xl:grid-cols-2 gap-4">

    <x-card>
      <table>
        <tr>
          <td class="py-2 px-3 text-gray-600">Nama Aplikasi</td>
          <td class="py-2 px-3">{{ $application->name }}</td>
        </tr>
        <tr>
          <td class="py-2 px-3 text-gray-600">Deskripsi</td>
          <td class="py-2 px-3">{{ $application->description }}</td>
        </tr>
        <tr>
          <td class="py-2 px-3 text-gray-600">Penggunaan</td>
          <td class="py-2 px-3">{{ $application->usage->name }}</td>
        </tr>
        <tr>
          <td class="py-2 px-3 text-gray-600">Platform</td>
          <td class="py-2 px-3">{{ $application->platform->name }}</td>
        </tr>
        <tr>
          <td class="py-2 px-3 text-gray-600">Teknologi</td>
          <td class="py-2 px-3">
            @foreach($application->technologies as $tech)
            <x-badge> {{ $tech }}</x-badge>
            @endforeach
          </td>
        </tr>
        <tr>
          <td class="py-2 px-3 text-gray-600">Sertifikat Elektronik</td>
          <td class="py-2 px-3">{{ $application->is_using_eloctronic_certificate ? 'Ya' : 'Tidak' }}</td>
        </tr>
        @if($application->is_using_eloctronic_certificate)
        <tr>
          <td class="py-2 px-3 text-gray-600">Nama Sertifikat Elektronik</td>
          <td class="py-2 px-3">{{ $application->electronic_certificate_name }}</td>
        </tr>
        @endif
        <tr>
          <td class="py-2 px-3 text-gray-600">Sistem Elektronik Teregistrasi</td>
          <td class="py-2 px-3">{{ $application->is_electronic_system_registered ? 'Ya' : 'Tidak' }}</td>
        </tr>
        <tr>
          <td class="py-2 px-3 text-gray-600">Lokasi Data</td>
          <td class="py-2 px-3">{{ $application->dataLocation->name }}</td>
        </tr>
        <tr>
          <td class="py-2 px-3 text-gray-600">Terintegrasi dengan pemerintah pusat</td>
          <td class="py-2 px-3">{{ $application->is_integrated_with_central_govt ? 'Ya' : 'Tidak' }}</td>
        </tr>
        <tr>
          <td class="py-2 px-3 text-gray-600">Layanan</td>
          <td class="py-2 px-3">{{ $application->serviceType->name }}</td>
        </tr>
        <tr>
          <td class="py-2 px-3 text-gray-600">URL</td>
          <td class="py-2 px-3"><a class="underline text-blue-600" href="{{ $application->url }}">{{ $application->url
              }}</a>
          </td>
        </tr>
        <tr>
          <td class="py-2 px-3 text-gray-600">Pengembang</td>
          <td class="py-2 px-3">{{ $application->developer->name }}</td>
        </tr>
        @if($application->developer_id == 2)
        <tr>
          <td class="py-2 px-3 text-gray-600">Vendor</td>
          <td class="py-2 px-3">
            <div class="rounded-lg border ">
              <table class="">
                <tbody class="divide-y">
                  <tr>
                    <td class="p-2 text-gray-600">Nama</td>
                    <td class="p-2">{{ $application->vendor->name }}</td>
                  </tr>
                  <tr>
                    <td class="p-2 text-gray-600">Alamat</td>
                    <td class="p-2">{{ $application->vendor->address }}</td>
                  </tr>
                  <tr>
                    <td class="p-2 text-gray-600">Website</td>
                    <td class="p-2">{{ $application->vendor->website }}</td>
                  </tr>
                  <tr>
                    <td class="p-2 text-gray-600">Email</td>
                    <td class="p-2">{{ $application->vendor->email }}</td>
                  </tr>
                  <tr>
                    <td class="p-2 text-gray-600">PIC</td>
                    <td class="p-2">{{ $application->vendor->pic_name }}</td>
                  </tr>
                  <tr>
                    <td class="p-2 text-gray-600">No. Handphone</td>
                    <td class="p-2">{{ $application->vendor->handphone }}</td>
                  </tr>
                </tbody>
              </table>
            </div>

          </td>
        </tr>
        @endif
        @if($application->developer_id ==3)
        <tr>
          <td class="py-2 px-3 text-gray-600">Pengembang Pusat</td>
          <td class="py-2 px-3">
            <div class="rounded-lg border ">
              <table class="">
                <tbody class="divide-y">
                  <tr>
                    <td class="p-2 text-gray-600">Nama</td>
                    <td class="p-2">{{ $application->devGovt->name }}</td>
                  </tr>
                  <tr>
                    <td class="p-2 text-gray-600">Alamat</td>
                    <td class="p-2">{{ $application->devGovt->address }}</td>
                  </tr>
                  <tr>
                    <td class="p-2 text-gray-600">Website</td>
                    <td class="p-2">{{ $application->devGovt->website }}</td>
                  </tr>
                  <tr>
                    <td class="p-2 text-gray-600">Email</td>
                    <td class="p-2">{{ $application->devGovt->email }}</td>
                  </tr>
                  <tr>
                    <td class="p-2 text-gray-600">PIC</td>
                    <td class="p-2">{{ $application->devGovt->pic_name }}</td>
                  </tr>
                  <tr>
                    <td class="p-2 text-gray-600">No. Handphone</td>
                    <td class="p-2">{{ $application->devGovt->handphone }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </td>
        </tr>
        @endif
        <tr>
          <td class="py-2 px-3 text-gray-600">Online</td>
          <td class="py-2 px-3">{{ $application->is_online ? 'Ya' : 'Tidak' }}</td>
        </tr>
        <tr>
          <td class="py-2 px-3 text-gray-600">Aktif</td>
          <td class="py-2 px-3">{{ $application->is_active ? 'Ya' : 'Tidak' }}</td>
        </tr>
        <tr>
          <td class="py-2 px-3 text-gray-600">Diinput pada</td>
          <td class="py-2 px-3">{{ $application->created_at }}</td>
        </tr>
        <tr>
          <td class="py-2 px-3 text-gray-600">Update terakhir</td>
          <td class="py-2 px-3">{{ $application->updated_at }}</td>
        </tr>
      </table>
    </x-card>

    <x-card>
      @forelse($application->organizations as $organization)
      <div class="border rounded-xl p-4 mb-4">
        {{-- {{ dd($organization->name) }} --}}
        <x-heading.h5 class="text-blue-500">{{ $organization->name }}</x-heading.h5>
        <h3 class="text-gray-500 mt-2">{{ $organization->acronym }}</h3>
        @foreach(json_decode($organization->pivot->contacts) as $contacts)
        <div class="rounded-lg border-2  border-gray-200 text-gray-600 my-2 p-2 bg-gray-50 text-sm">
          <table class="w-full ">
            <tbody class="divide-y">
              <tr>
                <td class="py-2  text-gray-400 w-[120px]">Nama</td>
                <td class="py-2 ">{{ $contacts->name }}</td>
              </tr>
              <tr>
                <td class="py-2  text-gray-400">No. HP</td>
                <td class="py-2 ">{{ $contacts->no_hp }}</td>
              </tr>
              <tr>
                <td class="py-2  text-gray-400">Jabatan</td>
                <td class="py-2 ">{{ $contacts->jabatan }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        @endforeach

      </div>
      @empty
      <p>Tidak ada data</p>
      @endforelse

      <x-link href="{{ route('application.show.attachOrganization', $application->id) }}">Tambah Organisasi</x-link>
    </x-card>
  </div>



  <!-- Modal toggle -->
  <button data-modal-target="defaultModal" data-modal-toggle="defaultModal"
    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-4"
    type="button">
    Hapus Aplikasi
  </button>

  <!-- Main modal -->
  <div id="defaultModal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
            Konfirmasi
          </h3>
          <button type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-hide="defaultModal">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-6 space-y-6">
          Yakin aplikasi & Website mau dihapus?
        </div>
        <!-- Modal footer -->
        <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
          <form action="{{ route('application.delete', $application->id) }}" method="post">
            @csrf
            @method('DELETE')
            <x-button type="submit">
              Ya, Hapus
            </x-button>
          </form>
          <button data-modal-hide="defaultModal" type="button"
            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
        </div>
      </div>
    </div>
  </div>
</x-layout>