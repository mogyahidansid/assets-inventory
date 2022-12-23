<div x-data>
  <div class="overflow-hidden bg-white shadow sm:rounded-md">
    <ul role="list" class="divide-y divide-gray-200">
      <li>
        <a href="#" class="block hover:bg-gray-50">
          <div class="px-4 py-2 sm:px-6">
            <div class="flex items-center justify-between">

              <div class="flex space-x-2 items-center  ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                  <path fill="none" d="M0 0h24v24H0z" />
                  <path
                    d="M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9zM8 7h3v2H8V7zm0 4h8v2H8v-2zm0 4h8v2H8v-2z" />
                </svg>
                <h1 class="font-semibold text-gray-600">LIST OF DAMAGE ASSETS</h1>
              </div>
              <x-button sm label="VIEW" class="medium" right-icon="eye" positive wire:click="viewReport(1)" />
            </div>

          </div>
        </a>
      </li>
      {{-- <li>
        <a href="#" class="block hover:bg-gray-50">
          <div class="px-4 py-2 sm:px-6">
            <div class="flex items-center justify-between">

              <div class="flex space-x-2 items-center  ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                  <path fill="none" d="M0 0h24v24H0z" />
                  <path
                    d="M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9zM8 7h3v2H8V7zm0 4h8v2H8v-2zm0 4h8v2H8v-2z" />
                </svg>
                <h1 class="font-semibold text-gray-600">LIST OF NEW ADDED ASSETS</h1>
              </div>
              <x-button sm label="VIEW" class="medium" right-icon="eye" positive wire:click="viewReport(2)" />
            </div>

          </div>
        </a>
      </li> --}}

      <li>
        <a href="#" class="block hover:bg-gray-50">
          <div class="px-4 py-2 sm:px-6">
            <div class="flex items-center justify-between">

              <div class="flex space-x-2 items-center  ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                  <path fill="none" d="M0 0h24v24H0z" />
                  <path
                    d="M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9zM8 7h3v2H8V7zm0 4h8v2H8v-2zm0 4h8v2H8v-2z" />
                </svg>
                <h1 class="font-semibold text-gray-600">LIST OF MOST BORROWED ASSETS</h1>
              </div>
              <x-button sm label="VIEW" class="medium" right-icon="eye" positive wire:click="viewReport(3)" />
            </div>

          </div>
        </a>
      </li>
      <li>
        <a href="#" class="block hover:bg-gray-50">
          <div class="px-4 py-2 sm:px-6">
            <div class="flex items-center justify-between">

              <div class="flex space-x-2 items-center  ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                  <path fill="none" d="M0 0h24v24H0z" />
                  <path
                    d="M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9zM8 7h3v2H8V7zm0 4h8v2H8v-2zm0 4h8v2H8v-2z" />
                </svg>
                <h1 class="font-semibold text-gray-600">LIST OF LEAST BORROWED ASSETS</h1>
              </div>
              <x-button sm label="VIEW" class="medium" right-icon="eye" positive wire:click="viewReport(4)" />
            </div>

          </div>
        </a>
      </li>
      <li>
        <a href="#" class="block hover:bg-gray-50">
          <div class="px-4 py-2 sm:px-6">
            <div class="flex items-center justify-between">

              <div class="flex space-x-2 items-center  ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                  <path fill="none" d="M0 0h24v24H0z" />
                  <path
                    d="M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9zM8 7h3v2H8V7zm0 4h8v2H8v-2zm0 4h8v2H8v-2z" />
                </svg>
                <h1 class="font-semibold text-gray-600">LIST OF UNRETURNED ASSETS</h1>
              </div>
              <x-button sm label="VIEW" class="medium" right-icon="eye" positive wire:click="viewReport(5)" />
            </div>

          </div>
        </a>
      </li>
      <li>
        <a href="#" class="block hover:bg-gray-50">
          <div class="px-4 py-2 sm:px-6">
            <div class="flex items-center justify-between">

              <div class="flex space-x-2 items-center  ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                  <path fill="none" d="M0 0h24v24H0z" />
                  <path
                    d="M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9zM8 7h3v2H8V7zm0 4h8v2H8v-2zm0 4h8v2H8v-2z" />
                </svg>
                <h1 class="font-semibold text-gray-600">LIST OF RECENTLY BORROWED ASSETS</h1>
              </div>
              <x-button sm label="VIEW" class="medium" right-icon="eye" positive wire:click="viewReport(6)" />
            </div>

          </div>
        </a>
      </li>
      <li>
        <a href="#" class="block hover:bg-gray-50">
          <div class="px-4 py-2 sm:px-6">
            <div class="flex items-center justify-between">

              <div class="flex space-x-2 items-center  ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                  <path fill="none" d="M0 0h24v24H0z" />
                  <path
                    d="M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9zM8 7h3v2H8V7zm0 4h8v2H8v-2zm0 4h8v2H8v-2z" />
                </svg>
                <h1 class="font-semibold text-gray-600">LIST OF LOST ASSETS</h1>
              </div>
              <x-button sm label="VIEW" class="medium" right-icon="eye" positive wire:click="viewReport(7)" />
            </div>

          </div>
        </a>
      </li>
      <li>
        <a href="#" class="block hover:bg-gray-50">
          <div class="px-4 py-2 sm:px-6">
            <div class="flex items-center justify-between">

              <div class="flex space-x-2 items-center  ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                  <path fill="none" d="M0 0h24v24H0z" />
                  <path
                    d="M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9zM8 7h3v2H8V7zm0 4h8v2H8v-2zm0 4h8v2H8v-2z" />
                </svg>
                <h1 class="font-semibold text-gray-600">LIST OF BLACKLISTED EMPLOYEE</h1>
              </div>
              <x-button sm label="VIEW" class="medium" right-icon="eye" positive wire:click="viewReport(8)" />
            </div>

          </div>
        </a>
      </li>
    </ul>
  </div>
  <x-modal max-width="5xl" wire:model.defer="report1_modal">
    <x-card title="">
      <div class="bg-gray-100 flex justify-end space-x-2 p-2 rounded-lg items-center ">
        <x-datetime-picker placeholder="Start Date" without-time wire:model="start_date" />
        <span>-</span>
        <x-datetime-picker placeholder="End Date" without-time wire:model="end_date" />
      </div>
      <div class="p-2 " x-ref="printContainer">
        <div class="flex space-x-1 items-center">
          <img src="{{ asset('assets/IMAnLogo.png') }}" class="h-10" alt="">
          <span class="font-semibold text-xl">INTEGRATED MINDANAONS ASSOCIATION FOR NATIVES (IMAN)</span>
        </div>
        <div class="mt-10 text-center text-2xl text-gray-700 font-bold">
          <h1>DAMAGE ASSETS</h1>
        </div>
        <table id="example" class="table-auto mt-5" style="width:100%">
          <thead class="font-normal">
            <tr>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">SERIAL NUMBER
              </th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">NAME</th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">BORROWED DATE
              </th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">EMPLOYEE</th>
            </tr>
          </thead>
          <tbody class="">
            @foreach ($damages as $item)
              <tr>
                <td class="border text-gray-600  px-3 py-1">{{ $item->asset->serial_number }}</td>
                <td class="border text-gray-600  px-3 py-1">{{ $item->asset->name }}
                </td>
                <td class="border text-gray-600  px-3 py-1">{{ $item->created_at->format('M d, Y') }}
                </td>
                <td class="border text-gray-600  px-3 py-1">{{ $item->user->employeeInformation->fullname }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <x-slot name="footer">
        <div class="flex justify-end gap-x-4">
          <x-button flat label="Cancel" x-on:click="close" />
          <x-button icon="printer" positive @click="printOut($refs.printContainer.outerHTML);"
            label="Print Report" />
        </div>
      </x-slot>
    </x-card>
  </x-modal>

  <x-modal max-width="5xl" wire:model.defer="report2_modal">
    <x-card title="">
      <div class="p-2 " x-ref="printContainer">
        <div class="flex space-x-1 items-center">
          <img src="{{ asset('assets/IMAnLogo.png') }}" class="h-10" alt="">
          <span class="font-semibold text-xl">INTEGRATED MINDANAONS ASSOCIATION FOR NATIVES (IMAN)</span>
        </div>
        <div class="mt-10 text-center text-2xl text-gray-700 font-bold">
          <h1>NEW ADDED ASSETS</h1>
        </div>
        <table id="example" class="table-auto mt-5" style="width:100%">
          <thead class="font-normal">
            <tr>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">SERIAL NUMBER
              </th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">NAME</th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">DESCRIPTION
              </th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">PRICE</th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">CATEGORY</th>
            </tr>
          </thead>
          <tbody class="">
            @foreach ($new_added as $item)
              <tr>
                <td class="border text-gray-600  px-3 py-1">{{ $item->serial_number }}</td>
                <td class="border text-gray-600  px-3 py-1">{{ $item->name }}
                </td>
                <td class="border text-gray-600  px-3 py-1">{{ $item->description }}
                </td>
                <td class="border text-gray-600  px-3 py-1"> &#8369;{{ number_format($item->price, 2) }}
                </td>
                <td class="border text-gray-600 uppercase  px-3 py-1">{{ $item->category->name }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <x-slot name="footer">
        <div class="flex justify-end gap-x-4">
          <x-button flat label="Cancel" x-on:click="close" />
          <x-button icon="printer" positive @click="printOut($refs.printContainer.outerHTML);"
            label="Print Report" />
        </div>
      </x-slot>
    </x-card>
  </x-modal>

  <x-modal max-width="5xl" wire:model.defer="report3_modal">
    <x-card title="">
      <div class="p-2 " x-ref="printContainer">
        <div class="flex space-x-1 items-center">
          <img src="{{ asset('assets/IMAnLogo.png') }}" class="h-10" alt="">
          <span class="font-semibold text-xl">INTEGRATED MINDANAONS ASSOCIATION FOR NATIVES (IMAN)</span>
        </div>
        <div class="mt-10 text-center text-2xl text-gray-700 font-bold">
          <h1>MOST BORROWED ASSETS</h1>
        </div>
        <table id="example" class="table-auto mt-5" style="width:100%">
          <thead class="font-normal">
            <tr>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">SERIAL NUMBER
              </th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">NAME</th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">DESCRIPTION
              </th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">PRICE</th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">CATEGORY</th>
            </tr>
          </thead>
          <tbody class="">
            @foreach ($borrowed as $item)
              <tr>
                <td class="border text-gray-600  px-3 py-1">{{ $item->serial_number }}</td>
                <td class="border text-gray-600  px-3 py-1">{{ $item->name }}
                </td>
                <td class="border text-gray-600  px-3 py-1">{{ $item->description }}
                </td>
                <td class="border text-gray-600  px-3 py-1"> &#8369;{{ number_format($item->price, 2) }}
                </td>
                <td class="border text-gray-600 uppercase  px-3 py-1">{{ $item->category->name }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <x-slot name="footer">
        <div class="flex justify-end gap-x-4">
          <x-button flat label="Cancel" x-on:click="close" />
          <x-button icon="printer" positive @click="printOut($refs.printContainer.outerHTML);"
            label="Print Report" />
        </div>
      </x-slot>
    </x-card>
  </x-modal>

  <x-modal max-width="5xl" wire:model.defer="report4_modal">
    <x-card title="">
      <div class="p-2 " x-ref="printContainer">
        <div class="flex space-x-1 items-center">
          <img src="{{ asset('assets/IMAnLogo.png') }}" class="h-10" alt="">
          <span class="font-semibold text-xl">INTEGRATED MINDANAONS ASSOCIATION FOR NATIVES (IMAN)</span>
        </div>
        <div class="mt-10 text-center text-2xl text-gray-700 font-bold">
          <h1>lEAST BORROWED ASSETS</h1>
        </div>
        <table id="example" class="table-auto mt-5" style="width:100%">
          <thead class="font-normal">
            <tr>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">SERIAL NUMBER
              </th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">NAME</th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">DESCRIPTION
              </th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">PRICE</th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">CATEGORY</th>
            </tr>
          </thead>
          <tbody class="">
            @foreach ($leasts as $item)
              <tr>
                <td class="border text-gray-600  px-3 py-1">{{ $item->serial_number }}</td>
                <td class="border text-gray-600  px-3 py-1">{{ $item->name }}
                </td>
                <td class="border text-gray-600  px-3 py-1">{{ $item->description }}
                </td>
                <td class="border text-gray-600  px-3 py-1"> &#8369;{{ number_format($item->price, 2) }}
                </td>
                <td class="border text-gray-600 uppercase  px-3 py-1">{{ $item->category->name }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <x-slot name="footer">
        <div class="flex justify-end gap-x-4">
          <x-button flat label="Cancel" x-on:click="close" />
          <x-button icon="printer" positive @click="printOut($refs.printContainer.outerHTML);"
            label="Print Report" />
        </div>
      </x-slot>
    </x-card>
  </x-modal>

  <x-modal max-width="5xl" wire:model.defer="report5_modal">
    <x-card title="">
      <div class="p-2 " x-ref="printContainer">
        <div class="flex space-x-1 items-center">
          <img src="{{ asset('assets/IMAnLogo.png') }}" class="h-10" alt="">
          <span class="font-semibold text-xl">INTEGRATED MINDANAONS ASSOCIATION FOR NATIVES (IMAN)</span>
        </div>
        <div class="mt-10 text-center text-2xl text-gray-700 font-bold">
          <h1>UNRETURNED ASSETS</h1>
        </div>
        <table id="example" class="table-auto mt-5" style="width:100%">
          <thead class="font-normal">
            <tr>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">SERIAL NUMBER
              </th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">NAME</th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">DESCRIPTION
              </th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">PRICE</th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">CATEGORY</th>
            </tr>
          </thead>
          <tbody class="">
            @foreach ($unreturned as $item)
              <tr>
                <td class="border text-gray-600  px-3 py-1">{{ $item->serial_number }}</td>
                <td class="border text-gray-600  px-3 py-1">{{ $item->name }}
                </td>
                <td class="border text-gray-600  px-3 py-1">{{ $item->description }}
                </td>
                <td class="border text-gray-600  px-3 py-1"> &#8369;{{ number_format($item->price, 2) }}
                </td>
                <td class="border text-gray-600 uppercase  px-3 py-1">{{ $item->category->name }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <x-slot name="footer">
        <div class="flex justify-end gap-x-4">
          <x-button flat label="Cancel" x-on:click="close" />
          <x-button icon="printer" positive @click="printOut($refs.printContainer.outerHTML);"
            label="Print Report" />
        </div>
      </x-slot>
    </x-card>
  </x-modal>

  <x-modal max-width="5xl" wire:model.defer="report6_modal">
    <x-card title="">
      <div class="p-2 " x-ref="printContainer">
        <div class="flex space-x-1 items-center">
          <img src="{{ asset('assets/IMAnLogo.png') }}" class="h-10" alt="">
          <span class="font-semibold text-xl">INTEGRATED MINDANAONS ASSOCIATION FOR NATIVES (IMAN)</span>
        </div>
        <div class="mt-10 text-center text-2xl text-gray-700 font-bold">
          <h1>RECENTLY BORROWED ASSETS</h1>
        </div>
        <table id="example" class="table-auto mt-5" style="width:100%">
          <thead class="font-normal">
            <tr>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">SERIAL NUMBER
              </th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">NAME</th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">DESCRIPTION
              </th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">PRICE</th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">CATEGORY</th>
            </tr>
          </thead>
          <tbody class="">
            @foreach ($recently as $item)
              <tr>
                <td class="border text-gray-600  px-3 py-1">{{ $item->serial_number }}</td>
                <td class="border text-gray-600  px-3 py-1">{{ $item->name }}
                </td>
                <td class="border text-gray-600  px-3 py-1">{{ $item->description }}
                </td>
                <td class="border text-gray-600  px-3 py-1"> &#8369;{{ number_format($item->price, 2) }}
                </td>
                <td class="border text-gray-600 uppercase  px-3 py-1">{{ $item->category->name }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <x-slot name="footer">
        <div class="flex justify-end gap-x-4">
          <x-button flat label="Cancel" x-on:click="close" />
          <x-button icon="printer" positive @click="printOut($refs.printContainer.outerHTML);"
            label="Print Report" />
        </div>
      </x-slot>
    </x-card>
  </x-modal>

  <x-modal max-width="5xl" wire:model.defer="report7_modal">
    <x-card title="">
      <div class="p-2 " x-ref="printContainer">
        <div class="flex space-x-1 items-center">
          <img src="{{ asset('assets/IMAnLogo.png') }}" class="h-10" alt="">
          <span class="font-semibold text-xl">INTEGRATED MINDANAONS ASSOCIATION FOR NATIVES (IMAN)</span>
        </div>
        <div class="mt-10 text-center text-2xl text-gray-700 font-bold">
          <h1>LOST ASSETS</h1>
        </div>
        <table id="example" class="table-auto mt-5" style="width:100%">
          <thead class="font-normal">
            <tr>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">SERIAL NUMBER
              </th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">NAME</th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">DESCRIPTION
              </th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">PRICE</th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">CATEGORY</th>
            </tr>
          </thead>
          <tbody class="">
            @foreach ($losts as $item)
              <tr>
                <td class="border text-gray-600  px-3 py-1">{{ $item->serial_number }}</td>
                <td class="border text-gray-600  px-3 py-1">{{ $item->name }}
                </td>
                <td class="border text-gray-600  px-3 py-1">{{ $item->description }}
                </td>
                <td class="border text-gray-600  px-3 py-1"> &#8369;{{ number_format($item->price, 2) }}
                </td>
                <td class="border text-gray-600 uppercase  px-3 py-1">{{ $item->category->name }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <x-slot name="footer">
        <div class="flex justify-end gap-x-4">
          <x-button flat label="Cancel" x-on:click="close" />
          <x-button icon="printer" positive @click="printOut($refs.printContainer.outerHTML);"
            label="Print Report" />
        </div>
      </x-slot>
    </x-card>
  </x-modal>

  <x-modal max-width="5xl" wire:model.defer="report8_modal">
    <x-card title="">
      <div class="p-2 " x-ref="printContainer">
        <div class="flex space-x-1 items-center">
          <img src="{{ asset('assets/IMAnLogo.png') }}" class="h-10" alt="">
          <span class="font-semibold text-xl">INTEGRATED MINDANAONS ASSOCIATION FOR NATIVES (IMAN)</span>
        </div>
        <div class="mt-10 text-center text-2xl text-gray-700 font-bold">
          <h1>BLACKLISTED EMPLOYEE</h1>
        </div>
        <table id="example" class="table-auto mt-5" style="width:100%">
          <thead class="font-normal">
            <tr>

              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">FULLNAME</th>
              <th class="border text-left px-2 text-sm font-medium text-gray-500 py-2">DEPARTMENT
              </th>

            </tr>
          </thead>
          <tbody class="">
            @foreach ($employees as $item)
              <tr>
                <td class="border text-gray-600  px-3 py-1">{{ $item->fullname }}</td>
                <td class="border text-gray-600  px-3 py-1">{{ $item->department->name }}
                </td>

              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <x-slot name="footer">
        <div class="flex justify-end gap-x-4">
          <x-button flat label="Cancel" x-on:click="close" />
          <x-button icon="printer" positive @click="printOut($refs.printContainer.outerHTML);"
            label="Print Report" />
        </div>
      </x-slot>
    </x-card>
  </x-modal>
</div>
