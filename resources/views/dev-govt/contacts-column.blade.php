<div>
  @foreach($getState() as $row)
  <div class="rounded-lg border p-2 my-1">
    <table class="">

      <body>
        <tr>
          <td class="px-1">Name</td>
          <td class="px-1">{{ $row['name'] }}</td>
        </tr>
        <tr>
          <td class="px-1">Email</td>
          <td class="px-1">{{ $row['email'] }}</td>
        </tr>
        <tr>
          <td class="px-1">No. HP</td>
          <td class="px-1">{{ $row['no_hp'] }}</td>
        </tr>
      </body>
    </table>
  </div>
  @endforeach
</div>