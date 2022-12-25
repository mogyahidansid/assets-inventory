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
            class="outline:none  h-8 focus:ring-0 flex-1 border-0 focus:border-0" placeholder="Search borrowers...">
        </div>
      </div>
    </div>

    <div class="overflow-hidden bg-white shadow sm:rounded-md mt-2">
      <ul role="list" class="divide-y divide-gray-200">
        @foreach ($employees as $employee)
          <li>
            <a href="#" class="block hover:bg-gray-50">
              <div class="flex items-center px-4 py-3 sm:px-6">
                <div class="flex min-w-0 flex-1 items-center">
                  <div class="flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-10 fill-green-700">
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path d="M5 20h14v2H5v-2zm7-2a8 8 0 1 1 0-16 8 8 0 0 1 0 16z" />
                    </svg>
                  </div>
                  <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                    <div>
                      <p class="truncate text-sm font-medium uppercase text-gray-600">{{ $employee->fullname }}</p>
                      <p class="mt-2 flex items-center text-sm text-gray-500">
                        <!-- Heroicon name: mini/envelope -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-3 mr-1 fill-red-500">
                          <path fill="none" d="M0 0h24v24H0z" />
                          <path
                            d="M11 17.938A8.001 8.001 0 0 1 12 2a8 8 0 0 1 1 15.938V21h-2v-3.062zM5 22h14v2H5v-2z" />
                        </svg>
                        <span class="truncate">{{ $employee->address }}</span>
                      </p>
                    </div>
                    <div class="hidden md:block">
                      <div>
                        <p class="text-sm text-gray-900">
                          Total Borrowed : {{ $employee->user->transactions->where('status', 4)->count() }}
                        </p>
                        <p class="mt-2 flex items-center text-sm text-gray-500">
                          <!-- Heroicon name: mini/check-circle -->
                          Status:
                          @switch($employee->status)
                            @case(1)
                              <span
                                class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs ml-2 font-medium text-green-800">Fast
                                Returner</span>
                            @break

                            @case(2)
                              <span
                                class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs ml-2 font-medium text-red-800">Blacklisted</span>
                            @break

                            @default
                          @endswitch
                          <x-button.circle 2xs class="ml-1" icon="pencil-alt" dark
                            wire:click="editBorrower({{ $employee->id }})"
                            spinner="editBorrower({{ $employee->id }})" />
                        </p>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </li>
        @endforeach
      </ul>
    </div>

    <x-modal align="center" max-width="md" wire:model.defer="manage_modal">
      <x-card title="Change Employee Status">
        <p class="text-gray-600">
          <x-native-select label="Select Status" wire:model="status">
            <option selected hidden>Status</option>
            <option value="1">Fast Returner</option>
            <option value="2">BlackListed</option>
          </x-native-select>
        </p>

        <x-slot name="footer">
          <div class="flex justify-end gap-x-4">
            <x-button flat label="Cancel" x-on:click="close" />
            <x-button positive wire:click="updateStatus" label="Save It" />
          </div>
        </x-slot>
      </x-card>
    </x-modal>

  </div>
