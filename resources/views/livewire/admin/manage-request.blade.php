<div>
  <div class="overflow-hidden bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
      <h3 class="text-lg font-medium leading-6 text-gray-900">Request Asset Form</h3>
      <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and application.</p>
    </div>
    <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
      <dl class="sm:divide-y sm:divide-gray-200">
        <div class="py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Full name</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
            {{ $requests->user->employeeInformation->firstname }} {{ $requests->user->employeeInformation->lastname }}
          </dd>
        </div>
        <div class="py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Transaction Number</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $requests->transaction_code }}</dd>
        </div>
        <div class="py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Borrowed Date</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
            {{ \Carbon\Carbon::parse($requests->borrowed_date)->format('F d, Y') }}
          </dd>
        </div>
        <div class="py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Returned Date</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
            {{ \Carbon\Carbon::parse($requests->returned_date)->format('F d, Y') }}</dd>
        </div>

        <div class="py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Requested Items</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
            <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">
              @foreach ($requests->requests as $item)
                <li class="flex flex-col ">
                  <div class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                    <div class="flex w-0 flex-1 items-center">
                      <!-- Heroicon name: mini/paper-clip -->
                      <svg class="h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                          d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                          clip-rule="evenodd" />
                      </svg>
                      <span class="ml-2 w-0 flex-1 flex space-x-1 truncate">
                        <span class="font-medium text-green-700 uppercase">{{ $item->category->name }}</span>
                        <span>x {{ $item->quantity }}</span>
                      </span>
                    </div>
                    <div class="ml-4 flex-shrink-0">
                      <x-button slate xs
                        spinner="manageItem({{ $item->category_id }},{{ $item->transaction->user_id }},{{ $item->id }})"
                        wire:click="manageItem({{ $item->category_id }},{{ $item->transaction->user_id }},{{ $item->id }})"
                        label="manage" />
                    </div>
                  </div>
                  <div class="border-t py-2 px-6">
                    @php
                      $gets = \App\Models\TemporaryRequest::where('category_id', $item->category_id)
                          ->with('asset')
                          ->get();
                      
                    @endphp
                    <div class="grid grid-cols-4">
                      @forelse ($gets as $item)
                        <div>
                          <span class="bg-gray-500 p-0.5 s text-white rounded-lg px-2">{{ $item->asset->name }}
                            <x-button.circle negative xs icon="trash" wire:click="removeItem({{ $item->id }})" />
                          </span>
                        </div>
                      @empty
                      @endforelse
                    </div>
                  </div>
                </li>
              @endforeach
            </ul>
          </dd>
        </div>
      </dl>
    </div>

    <div class="mt-3 py-2 px-6 flex justify-end items-center space-x-2">
      <x-button label="Decline" wire:click="$set('decline_modal', true)" negative right-icon="thumb-down" />
      <x-button label="Accept" wire:click="acceptRequest" positive right-icon="thumb-up" />
    </div>
  </div>

  <x-modal align="center" z-index="z-40" wire:model.defer="manage_modal">
    <x-card title="Select Assets">
      <div class="overflow-hidden bg-white shadow sm:rounded-md">
        <ul role="list" class="divide-y divide-gray-200">
          @foreach ($assets as $asset)
            <li>
              <a href="#" class="block hover:bg-gray-50">
                <div class="flex items-center px-4 py-2 sm:px-6">
                  <div class="min-w-0 flex-1 sm:flex sm:items-center sm:justify-between">
                    <div class="truncate">
                      <div class="flex text-sm">
                        <p class="truncate font-medium uppercase text-green-700">{{ $asset->name }}</p>

                      </div>
                      <div class=" flex">
                        <div class="flex items-center text-sm text-gray-500">
                          <p class="truncate  text-gray-700">{{ $asset->description }}</p>
                        </div>
                      </div>
                    </div>
                    <div class="mt-4 flex-shrink-0 sm:mt-0 sm:ml-5">
                      <x-button slate xs right-icon="arrow-narrow-right" wire:click="selectAsset({{ $asset->id }})"
                        label="select" />
                    </div>
                  </div>
                </div>
              </a>
            </li>
          @endforeach
        </ul>
      </div>

      <x-slot name="footer">
        <div class="flex justify-end gap-x-4">
          <x-button negative flat label="Cancel" x-on:click="close" />
        </div>
      </x-slot>
    </x-card>
  </x-modal>

  <x-modal align="center" z-index="z-40" wire:model.defer="decline_modal">
    <x-card>
      <div class="flex space-x-2 px-4">
        <div><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
          </svg>
        </div>
        <div class="py-1 flex-1">
          <h1 class="font-bold text-lg text-gray-600">Remarks</h1>
          <p class="font-xs text-gray-400">Please input your reason to decline the request.</p>

          <div class="mt-4">
            <x-textarea label="Your Remarks:" wire:model.defer="remarks" placeholder="write your remarks" />
          </div>
        </div>
      </div>

      <x-slot name="footer">
        <div class="flex justify-end gap-x-3">
          <x-button flat negative label="Cancel" x-on:click="close" />
          <x-button wire:click="declineRequest" positive label="Decline and Send it." />
        </div>
      </x-slot>
    </x-card>
  </x-modal>
</div>
