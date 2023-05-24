<div>
  <div class="flex gap-4 mb-6">

    <div class="w-[200px] h-[150px] border bg-white rounded-lg p-5 text-center">
      <div class="text-primary-700 font-semibold text-6xl">{{ $jmlAplikasi }}</div>
      <div class="mt-4 text-gray-600">Aplikasi & Website</div>
    </div>
    <div class="w-[200px] h-[150px] border bg-white rounded-lg p-5 text-center">
      <div class="text-primary-700 font-semibold text-6xl">{{ $jmlAplikasiUmum }}</div>
      <div class="mt-4 text-gray-600">Aplikasi Umum</div>
    </div>
    <div class="w-[200px] h-[150px] border bg-white rounded-lg p-5 text-center">
      <div class="text-primary-700 font-semibold text-6xl">{{ $jmlAplikasiKhusus }}</div>
      <div class="mt-4 text-gray-600">Aplikasi Khusus</div>
    </div>

  </div>
  {{ $this->table }}
</div>