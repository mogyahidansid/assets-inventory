<div>
  <table id="example" class="table-auto mt-5" style="width:100%">
    <thead class="font-normal">
      <tr>

        <th class="border text-left w-[10rem] px-2 text-sm font-medium text-gray-500 py-2">SERIAL NUMBER</th>
        <th class="border text-left w-[24rem] px-2 text-sm font-medium text-gray-500 py-2">NAME</th>
        <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2"></th>

      </tr>
    </thead>
    <tbody class="">
      @foreach ($assets as $asset)
        <tr>
          <td class="border text-gray-600  px-3 py-1">{{ $asset->serial_number }}</td>
          <td class="border text-gray-600  px-3 py-1">{{ $asset->name }}</td>
          <td class="border text-gray-600  px-3 py-1">
            @foreach ($asset->requestTransactions as $item)
              <ul>
                <li> {{ $item->request->transaction->borrowed_date }} -
                  {{ $item->request->transaction->user->employeeInformation->fullname }}</li>
              </ul>
            @endforeach
          </td>

        </tr>
      @endforeach
    </tbody>
  </table>
</div>
