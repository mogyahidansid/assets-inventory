<div>
  <div class="search flex items-center rounded-lg  px-3 py-1 w-72 border shadow-sm">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-gray-500" width="24" height="24">
      <path fill="none" d="M0 0h24v24H0z" />
      <path
        d="M11 2c4.968 0 9 4.032 9 9s-4.032 9-9 9-9-4.032-9-9 4.032-9 9-9zm0 16c3.867 0 7-3.133 7-7 0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7zm8.485.071l2.829 2.828-1.415 1.415-2.828-2.829 1.414-1.414z" />
    </svg>
    <input type="text" wire:model="search" class="outline:none  h-8 focus:ring-0 flex-1 border-0 focus:border-0"
      placeholder="Search asset...">
  </div>
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
