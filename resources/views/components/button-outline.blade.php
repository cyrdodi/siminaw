<button {{ $attributes->merge(['class' => 'text-blue-700 bg-white hover:bg-blue-700 hover:text-white
  focus:ring-4
  focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5
  mr-2 mb-2 focus:outline-none border-2 border-blue-700']) }} {{ $attributes }}>{{
  $slot }}</button>