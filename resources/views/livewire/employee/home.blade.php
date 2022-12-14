<div>
  <div class="header">
    <div class="flex justify-between ">
      <div class=" w-[26rem]">
        <div class="">
          <div class="min-w-0 flex-1">
            <h2 class="text-xl font-bold leading-7 text-gray-700 sm:truncate sm:text-xl sm:tracking-tight">REQUEST FORM
            </h2>
          </div>
          @if ($transaction_count == 2)
            <div class="rounded-md bg-red-50 p-4">
              <div class="flex">
                <div class="flex-shrink-0">
                  <!-- Heroicon name: mini/x-circle -->
                  <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                      d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                      clip-rule="evenodd" />
                  </svg>
                </div>
                <div class="ml-3">
                  <h3 class="text-sm  text-red-800">You have {{ $transaction_count }} unreturned assets.
                    Please make sure to return all your requested assets or you account will blacklisted.</h3>
                </div>
              </div>
            </div>
          @elseif($transaction_count >= 3)
            <div class="rounded-md bg-red-50 p-4">
              <div class="flex">
                <div class="flex-shrink-0">
                  <!-- Heroicon name: mini/x-circle -->
                  <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                      d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                      clip-rule="evenodd" />
                  </svg>
                </div>
                <div class="ml-3">
                  <h3 class="text-sm font-medium text-red-800">You have {{ $transaction_count }} unreturned assets.
                  </h3>
                  <div class="mt-2 text-sm text-red-700">
                    <ul role="list" class="list-disc space-y-1 pl-5">
                      <li>Your account have been placed on the blacklist and are not permitted to request any assets.
                        Please contact the administrator for more information.</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          @endif
          <div>
            <div class="mt-5 border-t py-4 flow-root">

              <ul role="list" class="-my-5 divide-y divide-gray-200">
                @forelse ($categories as $key => $category)
                  <li class="py-3">
                    <div class="flex items-center space-x-2">
                      <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-gray-700" width="24"
                          height="24">
                          <path fill="none" d="M0 0h24v24H0z" />
                          <path
                            d="M7 11.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0 10a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm10-10a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0 10a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9z" />
                        </svg>
                      </div>
                      <div class="min-w-0 flex-1">
                        <p class="truncate text-sm font-medium uppercase text-gray-700">{{ $category->name }}</p>
                        <p class="truncate text-sm leading-3 text-gray-500">{{ $category->assets->count() }} Assets</p>
                      </div>
                      <div>
                        <x-button label="get" loading-delay="short" spinner="selectCategory({{ $category->id }})"
                          wire:click="selectCategory({{ $category->id }})" positive xs />
                      </div>
                    </div>
                  </li>
                @empty

                  <div class="mt-3">
                    <h1 class="">No Assets Available...</h1>
                  </div>
                @endforelse
              </ul>
            </div>
          </div>

        </div>

      </div>
      <div class=" w-80">
        <div class="border-2 rounded-lg p-2 px-4">
          <header class="flex justify-between border-b items-center border-gray-300">
            <h2 class=" font-medium leading-7 text-gray-700 sm:truncate  sm:tracking-tight">Request List
            </h2>
            <button>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-gray-700 h-5">
                <path fill="none" d="M0 0H24V24H0z" />
                <path d="M19 3l4 5h-3v12h-2V8h-3l4-5zm-5 15v2H3v-2h11zm0-7v2H3v-2h11zm-2-7v2H3V4h9z" />
              </svg>
            </button>
          </header>
          <div class="mt-3">
            <div>
              <div class="mt-6 flow-root">
                <ul role="list" class="-my-5 divide-y divide-gray-200">
                  @forelse ($category_get as $key => $item)
                    <li class="py-1">
                      <div class="flex items-center space-x-4">
                        <div class="min-w-0 flex-1">
                          <p class="truncate text-sm font-bold uppercase text-green-700">{{ $item['name'] }}</p>
                          <div class="flex items-center gap-x-1">
                            <x-button.circle wire:click="minusQty({{ $key }})"
                              spinner="minusQty({{ $key }})" xs icon="minus" />

                            <span class="bg-teal-600 py-0.5 rounded-sm text-white text-sm px-3"
                              x-text="{{ $item['qty'] }}"></span>

                            <x-button.circle wire:click="addQty({{ $key }})"
                              spinner="addQty({{ $key }})" xs icon="plus" />
                          </div>
                        </div>
                        <div>
                          <x-button wire:click="removeItem({{ $key }})" rounded 2xs label="cancel" negative />
                        </div>
                      </div>
                    </li>
                  @empty
                    <div class="flex flex-col space-y-2 py-10 justify-center items-center">
                      <x-svg.empty class="h-40" />
                      <span class="text-sm text-gray-500">Empty list...</span>
                    </div>
                  @endforelse
                </ul>
              </div>
              @if (count($category_get) > 0)
                <div class="mt-10">
                  <x-button wire:click="$set('request_form', true)" label="Send Request"
                    right-icon="chevron-double-right" dark class="w-full" />
                </div>
              @endif
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>

  <x-modal.card align="center" z-index="z-40" title="FORM CONFIRMATION" max-width="4xl" blur
    wire:model.defer="request_form">
    <div class="mt-3 flex justify-between">
      <div>
        <h1 class="font-semibold text-gray-600">Your Personal Information</h1>
        <div class="border-l-2 px-2 border-green-700">
          <div class="mt-2">
            <h1 class="text-gray-600 text-xs">Borrower Name</h1>
            <span class="text-gray-700">{{ auth()->user()->employeeInformation->firstname }}
              {{ auth()->user()->employeeInformation->lastname }}</span>
          </div>
          <div class="mt-2">
            <h1 class="text-gray-600 text-xs">Address</h1>
            <span class="text-gray-700">{{ auth()->user()->employeeInformation->address }}</span>
          </div>
          <div class="mt-2">
            <h1 class="text-gray-600 text-xs">Phone Number</h1>
            <span class="text-gray-700">{{ auth()->user()->employeeInformation->contact }}</span>
          </div>
        </div>
      </div>
      <div>
        <x-datetime-picker label="Return Date" without-time placeholder="" :min="now()"
          wire:model.defer="return_date" />
        <div class="mt-3">
          <h1 class="text-gray-600 text-xs">Accountable Person</h1>
          <span class="text-gray-700 underline">{{ auth()->user()->employeeInformation->department->name }}</span>
        </div>

        <div class="mt-2">
          <x-textarea wire:model="purpose" placeholder="Your purpose" />
        </div>
      </div>
    </div>
    <div class=" mt-5 bg-green-100 rounded-lg p-3">
      <header>
        <h1 class="text-lg uppercase text-gray-700 font-bold ">Your Request Item</h1>
      </header>
      <div class="grid mt-2 grid-cols-4 gap-4">
        @foreach ($category_get as $item)
          <div class="bg-white p-1 px-4">
            <h1 class="font-semibold  uppercase text-green-700">{{ $item['name'] }}</h1>
            <h1 class="leading-3 text-sm">x {{ $item['qty'] }}</h1>
          </div>
        @endforeach
      </div>
    </div>
    <x-slot name="footer">
      <div class="flex justify-end items-center space-x-2">
        <x-button wire:click="$set('request_form', false)" label="Cancel" negative />
        <x-button label="Confirm Request" wire:click="confirmDialog" spinner="confirmRequest"
          right-icon="chevron-double-right" dark />
      </div>
    </x-slot>
  </x-modal.card>
</div>
