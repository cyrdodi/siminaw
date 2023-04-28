<x-layout>
  {{-- <x-heading.h2>Sistem Manajemen Inventaris Aplikasi & Website</x-heading.h2>
  <x-heading.h3 class="text-blue-500 mt-4">Dinas Komunikasi Informatika Sandi dan Statistik</x-heading.h3> --}}
  <div class="flex gap-4">
    <x-widget :number="$applications->count()" title="Aplikasi & Website Aktif" />
    <x-widget :number="$managedByDiskomsantik" title="Dikelola Diskomsantik" />
  </div>

  {{-- table --}}
  <x-heading.h6 class="mt-8 mb-2">5 Tech Stack Terbanyak</x-heading.h6>
  <div class="relative overflow-x-auto shadow-md sm:rounded-2xl w-1/4">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
            Tech Stack
          </th>
          <th scope="col" class="px-6 py-3">
            Jumlah
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($listTechnology as $tech)
        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $tech->technology }}
          </th>
          <td class="px-6 py-4">
            {{ $tech->count }}
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
</x-layout>