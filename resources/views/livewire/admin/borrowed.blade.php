<div>

  <div class="mt-10">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <div class="search flex items-center rounded-lg  px-3 py-1 w-72 border shadow-sm">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-gray-500" width="24" height="24">
            <path fill="none" d="M0 0h24v24H0z" />
            <path
              d="M11 2c4.968 0 9 4.032 9 9s-4.032 9-9 9-9-4.032-9-9 4.032-9 9-9zm0 16c3.867 0 7-3.133 7-7 0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7zm8.485.071l2.829 2.828-1.415 1.415-2.828-2.829 1.414-1.414z" />
          </svg>
          <input type="text" wire:model="search"
            class="outline:none  h-8 focus:ring-0 flex-1 border-0 focus:border-0" placeholder="Search transaction...">
        </div>
      </div>

    </div>
    <div class="overflow-hidden mt-5 bg-white shadow sm:rounded-md">
      <ul role="list" class="divide-y divide-gray-200">
        @forelse ($transactions as $key => $transaction)
          <li wire:key="{{ $key }}" wire:click="manageBorrow({{ $transaction->id }})">
            <a href="#" class="block hover:bg-gray-50">
              <div class="flex items-center px-4 py-4 sm:px-6">
                <div class="min-w-0 flex-1 sm:flex sm:items-center sm:justify-between">
                  <div class="truncate">
                    <div class="flex text-sm">
                      <p class="truncate text-gray-500">Transaction Number: </p>
                      <p class="truncate font-bold text-green-600 uppercase ml-2">{{ $transaction->transaction_code }}
                      </p>
                    </div>
                    <div class="mt-2 flex">
                      <div class="flex items-center text-sm text-gray-500">
                        <!-- Heroicon name: mini/calendar -->
                        <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd"
                            d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z"
                            clip-rule="evenodd" />
                        </svg>
                        <p>
                          Return Date:
                          <time class="text-gray-700 font-semibold"
                            datetime="2020-01-07">{{ \Carbon\Carbon::parse($transaction->returned_date)->format('F d, Y') }}</time>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="mt-4 flex-shrink-0 sm:mt-0 sm:ml-5 flex space-x-10 items-center">
                    <div class="flex flex-col">
                      <h1 class="text-xs text-gray-500 "> Requested Item:</h1>
                      <h1 class="leading-3 font-semibold text-green-600"> {{ count($transaction->requests) }} Assets
                      </h1>
                    </div>
                    <div>
                      @switch($transaction->status)
                        @case(1)
                          <span
                            class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800">Pending</span>
                        @break

                        @case(2)
                          <span
                            class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">Accepted</span>
                        @break

                        @case(4)
                          <span
                            class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800">Declined</span>
                        @break

                        @case(4)
                          <span
                            class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800">Returned</span>
                        @break

                        @default
                      @endswitch
                    </div>
                  </div>
                </div>
                <div class="ml-5 flex-shrink-0">
                  <!-- Heroicon name: mini/chevron-right -->
                  <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                      d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                      clip-rule="evenodd" />
                  </svg>
                </div>
              </div>
            </a>
          </li>
          @empty
            <div class=" p-3 text-center">
              <span class="text-gray-500">No Results found.</span>
            </div>
          @endforelse
        </ul>
      </div>

    </div>

    <x-modal align="center" z-index="z-50" wire:model.defer="manage_borrow">
      <x-card title=" TRANSACTION CODE: {{ $transaction_code }}">
        <div>
          <div class="">
            <h3 class="text-xs text-gray-500">Borrowed Date:</h3>
            <p class=" font-semibold text-green-600">{{ \Carbon\Carbon::parse($borrowed)->format('F d, Y') }}</p>
          </div>
          <div class="mt-2">
            <h3 class="text-xs text-gray-500">Returned Date:</h3>
            <p class=" font-semibold text-red-600">{{ \Carbon\Carbon::parse($return)->format('F d, Y') }}</p>
          </div>
          <div class="mt-2">
            <h3 class="text-xs text-gray-500">Purpose of borrowing:</h3>
            <p class=" font-semibold text-gray-600">{{ $purpose }}</p>
          </div>
        </div>
        <div class="mt-5  border-t-2">
          @php
            $requestTransactions = \App\Models\RequestTransaction::whereIn('asset_id', $requests)->get();
            // $requestTransactions = \App\Models\RequestTransaction::where('asset_id', $requests)->get();
          @endphp

          {{-- @dump($requestTransactions) --}}
          @foreach ($requestTransactions as $item)
            <div class="flex mt-2 border-b justify-between">
              <div>
                <h1 class="font-bold text-gray-700">{{ $item->asset->name }}</h1>
                <p class="text-xs text-gray-500">Serial Number: {{ $item->asset->serial_number }}</p>
                <p class="text-xs text-gray-500">Last remarks: {{ $item->asset->remarks }}</p>
              </div>
              <div class="w-72 border-l p-1">

                <x-native-select label="Select New remarks" wire:model="new_remarks.{{ $item->asset->id }}">
                  <option selected hidden value="">----------</option>
                  <option value="1">Brand New</option>
                  <option value="2">Functional</option>
                  <option value="3">Unfunctional</option>
                  <option value="4">Slightly Damage</option>
                  <option value="5">Damage</option>
                  <option value="6">Lost</option>
                </x-native-select>
                @if ($new_remarks == null)
                @elseif ($new_remarks[$item->asset->id] == 5 || $new_remarks[$item->asset->id] == 4)
                  <x-input label="Damage Remarks" wire:model="damage_remarks.{{ $item->asset->id }}" />
                @endif
                {{-- @if ($new_remarks . [$item->asset->id] == 5)
                  <x-input label="Damage Remarks" wire:model="damage_remarks.{{ $item->asset->id }}" />
                @endif --}}
              </div>
            </div>
          @endforeach
        </div>

        <x-slot name="footer">
          <div class="flex justify-end gap-x-2">
            <x-button dark negative label="Cancel" x-on:click="close" />
            <x-button wire:click="returnAsset" right-icon="reply" positive label="Returned Assets" />
          </div>
        </x-slot>
      </x-card>
    </x-modal>

  </div>
