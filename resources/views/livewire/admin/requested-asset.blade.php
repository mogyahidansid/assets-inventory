<div>
  <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
    @forelse ($transactions as $transaction)
      <li class="col-span-1  border bg-white shadow">
        <div class="flex w-full items-center justify-between space-x-6 p-6">
          <div class="flex-1 flex flex-col space-y-4 truncate">
            <div class="">
              <h3 class="truncate text-xs  text-gray-500">Transaction Number:</h3>
              <p class="mt-1 leading-3 truncate text-sm font-semibold text-green-600">
                {{ $transaction->transaction_code }}</p>
            </div>
            <div class="">
              <h3 class="truncate text-xs  text-gray-500">Requested Item:</h3>
              <p class=" leading-3 truncate text-sm font-semibold text-green-600">{{ count($transaction->requests) }}
                @choice('Asset|Assets', count($transaction->requests))
              </p>
            </div>
            <div class="">
              <h3 class="truncate text-xs  text-gray-500">Return Date:</h3>
              <div class="flex space-x-1 items-center text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd"
                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                    clip-rule="evenodd" />
                </svg>
                <span
                  class="text-sm font-semibold">{{ \Carbon\Carbon::parse($transaction->return_date)->format('F d, Y') }}</span>
              </div>
            </div>

          </div>

          <div>
            <img class="h-10 w-10 flex-shrink-0 rounded-full border shadow-md bg-gray-300"
              src="{{ $transaction->user->profile_photo_url }}" alt="">

          </div>
        </div>
        <div class="px-4 mb-2">
          <x-button label="Open Request" sm slate right-icon="arrow-narrow-right" class="w-full" />
        </div>
      </li>
    @empty
    @endforelse

    <!-- More people... -->
  </ul>

</div>
