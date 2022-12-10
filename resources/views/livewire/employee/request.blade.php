<div>
  <header>
    <h2 class="text-xl font-bold leading-7 text-gray-700 sm:truncate sm:text-xl sm:tracking-tight">REQUESTED ASSETS
    </h2>
  </header>
  <div class="mt-10">
    <div class="overflow-hidden bg-white shadow sm:rounded-md">
      <div class="flex justify-end">
        <x-native-select wire:model="filter_id">
          <option selected hidden>Filter by Status</option>
          <option value="1">Pending</option>
          <option value="2">Accepted</option>
          <option value="3">Declined</option>
        </x-native-select>
      </div>
      <ul role="list" class="divide-y divide-gray-200">
        @forelse ($transactions as $transaction)
          <li>
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
            <div class="mt-10">
              <h1 class="text-center text-gray-500">No Requested Assets...</h1>
            </div>
          @endforelse
        </ul>
      </div>

    </div>
  </div>
