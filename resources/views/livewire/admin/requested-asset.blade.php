<div>
  <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
    @forelse ($transactions as $transaction)
      <li class="col-span-1  border bg-white shadow relative overflow-hidden">
        @switch($transaction->status)
          @case(1)
            <div class="bg-yellow-400 text-gray-600 shadow-xl  text-center w-40 -right-11  rotate-45 top-5 absolute">
              Pending
            </div>
          @break

          @case(2)
            <div class="bg-green-600 text-white shadow-xl  text-center w-40 -right-11  rotate-45 top-5 absolute">
              Accepted
            </div>
          @break

          @case(3)
            <div class="bg-red-400 text-white shadow-xsl  text-center w-40 -right-11  rotate-45 top-5 absolute">
              Declined
            </div>

            @default
          @endswitch
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
                    class="text-sm font-semibold">{{ \Carbon\Carbon::parse($transaction->returned_date)->format('F d, Y') }}</span>
                </div>
              </div>

            </div>

            <div>
              {{-- <img class="h-10 w-10 flex-shrink-0 rounded-full border-2 border-gray-400 shadow-md bg-gray-300"
              src="{{ $transaction->user->profile_photo_url }}" alt=""> --}}
              <x-avatar xl class="uppercase"
                label="{{ $transaction->user->employeeInformation->firstname[0] }}{{ $transaction->user->employeeInformation->firstname[1] }}" />

            </div>
          </div>
          <div class="px-4 mb-2">
            <x-button label="Open Request" href="{{ route('admin.manage-request', ['id' => $transaction->id]) }}" sm slate
              right-icon="arrow-narrow-right" class="w-full" />
          </div>
        </li>
        @empty
          <div class="col-span-4 mt-10">
            <h1 class="text-center text-gray-500">No Requested Asset...</h1>
          </div>
        @endforelse

        <!-- More people... -->
      </ul>

      <x-modal wire:model.defer="open_request" align="center">
        <x-card title="REQUEST FORM">

          <header>
            <h1 class="font-bold text-lg text-gray-600">EMPLOYEE INFORMATION</h1>
          </header>
          <div class="border-l-2 pl-2  border-green-600">
            <div class="grid mt-3 grid-cols-2 gap-4">
              <div class="">
                <h3 class="text-xs text-gray-500">Full Name:</h3>
                <p class=" font-semibold text-green-600">{{ $fullname }}</p>
              </div>
              <div class="">
                <h3 class="text-xs text-gray-500">Phone Number:</h3>
                <p class=" font-semibold text-green-600">{{ $contact }}</p>
              </div>
            </div>
            <div class="mt-2">
              <h3 class="text-xs text-gray-500">Address:</h3>
              <p class=" font-semibold text-green-600">{{ $address }}</p>
            </div>
          </div>

          <div class="mt-3 bg-green-100 p-3 rounded-md">
            <header>
              <h1 class="font-bold text-gray-500">REQUESTED ASSET</h1>
            </header>
            @php
              $requests = \App\Models\Request::where('transaction_id', $assets)->get();
            @endphp
            <div class="mt-2 ">
              <div class="overflow-hidden bg-white shadow sm:rounded-md">
                <ul role="list" class="divide-y divide-gray-200">
                  @foreach ($requests as $item)
                    <li>
                      <div class="block hover:bg-gray-50">
                        <div class="px-4 py-2 sm:px-6">
                          <div class="flex items-center justify-between">
                            <div class="text-sm">
                              <div class="flex space-x-1">
                                <h1>Requested Item:</h1>
                                <h1 class="font-medium">{{ $item->category->name }}</h1>
                              </div>
                              <div class="flex space-x-1">
                                <h1>Quantity:</h1>
                                <h1 class="font-medium">{{ $item->quantity }}</h1>
                              </div>
                            </div>
                            <div class="ml-2 flex flex-shrink-0">
                              <x-button slate xs right-icon="arrow-narrow-right" label="manage" />
                            </div>
                          </div>

                        </div>
                      </div>
                    </li>
                  @endforeach
                </ul>
              </div>


            </div>
          </div>

          <x-slot name="footer">
            <div class="flex justify-end gap-x-2">
              <x-button negative sm label="Decline" right-icon="thumb-down" x-on:click="close" />
              <x-button positive sm right-icon="thumb-up" label="Accept" />
            </div>
          </x-slot>
        </x-card>
      </x-modal>

    </div>
