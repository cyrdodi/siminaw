<x-layout>
  <x-breadcrumb :homePage="['name' => 'Aplikasi & Web', 'route' => route('application.index')]" currentPage="Detail" />
  <div class="flex justify-between items-center">

    <x-heading.h4 class="mb-4">Detail Aplikasi & Web</x-heading.h4>

    <x-link :href="route('application.edit', $application->id)">Edit</x-link>
  </div>

  <div class="grid grid-cols-2 gap-4">

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
          <td class="py-2 px-3">{{ $application->penggunaan->name }}</td>
        </tr>
        <tr>
          <td class="py-2 px-3 text-gray-600">Jenis</td>
          <td class="py-2 px-3">{{ $application->jenis->name }}</td>
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
            <table class="rounded-lg border p-4">
              <tr>
                <td class="py-2 px-3">Nama</td>
                <td class="py-2 px-3">{{ $application->devGovt->name }}</td>
              </tr>
              <tr>
                <td class="py-2 px-3">Alamat</td>
                <td class="py-2 px-3">{{ $application->devGovt->address }}</td>
              </tr>
              <tr>
                <td class="py-2 px-3">Website</td>
                <td class="py-2 px-3">{{ $application->devGovt->website }}</td>
              </tr>
              <tr>
                <td class="py-2 px-3">Email</td>
                <td class="py-2 px-3">{{ $application->devGovt->email }}</td>
              </tr>
              <tr>
                <td class="py-2 px-3">PIC</td>
                <td class="py-2 px-3">{{ $application->devGovt->pic_name }}</td>
              </tr>
              <tr>
                <td class="py-2 px-3">No. Handphone</td>
                <td class="py-2 px-3">{{ $application->devGovt->handphone }}</td>
              </tr>
            </table>
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
        @foreach(json_decode($organization->pivot->detail) as $detail)
        <div class="rounded-lg border-2  border-gray-200 text-gray-600 my-2 p-2 bg-gray-50 text-sm">
          <table class="w-full ">
            <tbody class="divide-y">
              <tr>
                <td class="py-2  text-gray-400 w-[120px]">Nama</td>
                <td class="py-2 ">{{ $detail->name }}</td>
              </tr>
              <tr>
                <td class="py-2  text-gray-400">No. HP</td>
                <td class="py-2 ">{{ $detail->no_hp }}</td>
              </tr>
              <tr>
                <td class="py-2  text-gray-400">Jabatan</td>
                <td class="py-2 ">{{ $detail->jabatan }}</td>
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
</x-layout>