@props(['number', 'title'])
<div class="flex items-center justify-center w-[252px] rounded-2xl shadow-sm bg-white p-4 h-[160px]">
  <div class="text-center">
    <x-heading.h1 class="text-blue-700">{{ $number }}</x-heading.h1>
    <x-heading.h5 class="mt-2 text-gray-600">{{ $title }}</x-heading.h5>
  </div>
</div>