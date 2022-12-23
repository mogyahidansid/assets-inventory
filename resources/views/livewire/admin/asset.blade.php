<div>
  <div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <div class="search flex items-center rounded-lg  px-3 py-1 w-72 border shadow-sm">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-gray-500" width="24" height="24">
            <path fill="none" d="M0 0h24v24H0z" />
            <path
              d="M11 2c4.968 0 9 4.032 9 9s-4.032 9-9 9-9-4.032-9-9 4.032-9 9-9zm0 16c3.867 0 7-3.133 7-7 0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7zm8.485.071l2.829 2.828-1.415 1.415-2.828-2.829 1.414-1.414z" />
          </svg>
          <input type="text" class="outline:none  h-8 focus:ring-0 flex-1 border-0 focus:border-0"
            placeholder="Search asset...">
        </div>
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none flex item-center space-x-1.5">
        <x-button icon="cog" slate wire:click="$set('manage_category', true)" />
        <x-button icon="plus" wire:click="$set('add_modal', true)" label="Add New" positive />
        <x-native-select wire:model="filter_id">
          <option selected hidden>Filter by Category</option>
          @forelse ($categories as $item)
            <option value="{{ $item->id }}">{{ ucfirst($item->name) }}</option>
          @empty
            <option>No Categories Available</option>
          @endforelse
        </x-native-select>
      </div>
    </div>
    <div class="mt-5 flex flex-col">
      <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col"
                    class="py-3 pl-4 pr-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-6">
                    INVENTORY CODE</th>
                  <th scope="col"
                    class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">
                    serial number
                  </th>
                  <th scope="col"
                    class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">name
                  </th>
                  <th scope="col"
                    class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">description
                  </th>
                  <th scope="col"
                    class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">price
                  </th>
                  <th scope="col"
                    class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">status
                  </th>
                  <th scope="col" class="relative py-3 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Edit</span>
                  </th>
                  <th scope="col" class="relative py-3 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">category</span>
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white">
                @forelse ($inventories as $inventory)
                  <tr>
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-700 sm:pl-6">
                      {{ $inventory->inventory_code }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                      {{ $inventory->assets->first()->serial_number }}
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                      {{ $inventory->assets->first()->name }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                      {{ $inventory->assets->first()->description }}
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                      &#8369;{{ number_format($inventory->assets->first()->price, 2) }}
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                      @switch($inventory->assets->first()->status)
                        @case(1)
                          <span
                            class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">Available</span>
                        @break

                        @case(2)
                          <span
                            class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800">Not
                            Available</span>
                        @break

                        @default
                      @endswitch
                    </td>
                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                      <x-button label="  {{ $inventory->assets->first()->category->name }}" 2xs class="uppercase" />
                    </td>
                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm  sm:pr-6">
                      <x-button label="Option" wire:click="openOption({{ $inventory->assets()->first()->id }})"
                        icon="cog" xs dark />
                    </td>
                  </tr>
                  @empty
                    <tr class="border-t border-gray-200">
                      <th colspan="6" scope="colgroup"
                        class="bg-gray-50 px-4 py-2 text-center text-sm font-normal  text-gray-500 sm:px-6">
                        No Assets Available..</th>
                    </tr>
                  @endforelse

                  <!-- More people... -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <x-modal.card title="Manage Category" z-index="z-40" max-width="md" wire:model.defer="manage_category">
      <form action="">
        <div class="border px-3 py-1">
          <x-input wire:model="category_name" label="Category name" placeholder="" />
          <div class="mt-1 flex justify-end">
            <x-button wire:click="saveCategory" label="Save" xs positive />
          </div>
        </div>
      </form>
      <div class="mt-2 mb-2">
        <div>
          <div class="mt-5 px-2 flow-root">
            <ul role="list" class="-my-5 divide-y divide-gray-200">
              @forelse ($categories as $category)
                <li class="py-2">
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
                      <p class="truncate leading-3 text-sm text-gray-500">{{ $category->assets->count() }} Assets</p>
                    </div>
                    <div class="flex space-x-1">
                      <x-button icon="pencil-alt" xs positive />
                      <x-button icon="trash" xs negative />
                    </div>
                  </div>
                </li>
              @empty
                <div class=" flex mt-2">
                  <p class="text-sm text-gray-500">No category found...</p>
                </div>
              @endforelse
            </ul>
          </div>
        </div>
      </div>

      <x-slot name="footer">
        <x-button label="Close" xs negative wire:click="$set('manage_category', false)" />
      </x-slot>
    </x-modal.card>

    <x-modal.card align="center" title="Add New Assets" z-index="z-40" max-width="lg" wire:model.defer="add_modal">
      <div class="grid grid-cols-2 gap-3">
        <div class="col-span-2">
          <x-input wire:model.defer="asset_name" label="Asset name" placeholder="" />
        </div>
        <div class="col-span-2">
          <x-textarea wire:model.defer="asset_description" label="Description" placeholder="Describe the asset" />
        </div>
        <x-input wire:model.defer="asset_price" label="Price" suffix="₱" />
        <x-input wire:model.defer="asset_serial_number" label="Serial Number" />
        <div class="col-span-1">

          <x-native-select label="Select remarks" wire:model="asset_remarks">
            <option selected hidden value="">----------</option>
            <option value="1">Brand New</option>
            <option value="2">Functional</option>
            <option value="3">Unfunctional</option>
            <option value="4">Slightly Damage</option>
            <option value="5">Damage</option>
            <option value="5">Lost</option>
          </x-native-select>
          @if ($asset_remarks == 4 || $asset_remarks == 5)
            <div class="mt-2">
              <x-textarea wire:model.defer="remarks_reason" label="Reason" placeholder="reasons of the asset" />
            </div>
          @endif
        </div>
        <div class="col-span-1">
          <x-native-select label="Category" wire:model.defer="asset_category">
            <option seleted hidden>Select Category</option>
            @foreach ($categories as $item)
              <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
          </x-native-select>
          <div class="mt-4">
            <x-checkbox id="right-label" label="Is Bundle" wire:model="isBundle" />
            @if ($isBundle)
              <div class="mt-3">
                <x-inputs.number label="Quantity" wire:model.defer="asset_quantity" />
              </div>
            @endif

          </div>
        </div>


      </div>

      <x-slot name="footer">
        <div class="flex justify-end space-x-1">
          <x-button label="Close" xs default wire:click="$set('add_modal', false)" />
          <x-button label="Save" xs positive wire:click="saveAsset" />
        </div>
      </x-slot>
    </x-modal.card>

    <x-modal.card title="Option" z-index="z-40" max-width="sm" wire:model.defer="option_modal">
      <div class="grid grid-cols-1 gap-3 px-4">
        <x-button wire:click="viewAsset" spinner="viewAsset" label="View Asset" icon="eye" />
        <x-button wire:click="editAsset" spinner="editAsset" label="Edit Asset" positive icon="pencil-alt" />
      </div>
    </x-modal.card>

    <x-modal.card align="center" title="INVENTORY CODE: {{ $asset_inventory_code }}" z-index="z-40"
      wire:model.defer="view_modal">
      <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-700">Serial Number</dt>
            <dd class="mt-1 text-sm uppercase text-gray-900">
              {{ $asset_serial_number }}</dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-700">Name</dt>
            <dd class="mt-1 text-sm text-gray-900">{{ $asset_name }}</dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-700">Description</dt>
            <dd class="mt-1 text-sm text-gray-900">{{ $asset_description }}</dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-700">Price</dt>
            <dd class="mt-1 text-sm text-gray-900">&#8369;{{ number_format($asset_price, 2) }}</dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-700">Remarks</dt>
            @switch($asset_remarks)
              @case(1)
                <x-badge flat primary label="Brand New" />
              @break

              @case(2)
                <x-badge flat positive label="Functional" />
              @break

              @case(3)
                <x-badge flat info label="unfunctional" />
              @break

              @case(4)
                <x-badge flat warning label="Slight Damage" />
              @break

              @case(5)
                <x-badge flat danger label="Damage" />
              @break

              @default
            @endswitch
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-700">Category</dt>
            <dd class="mt-1 text-sm uppercase text-gray-900">{{ $asset_category }}</dd>
          </div>
          @if ($asset_remarks == 4 || $asset_remarks == 5)
            <div class="sm:col-span-2">
              <dt class="text-sm font-medium text-gray-700">Reason</dt>
              <dd class="mt-1 text-sm text-gray-900">{{ $remarks_reason }}</dd>
            </div>
          @endif

        </dl>
      </div>
    </x-modal.card>

    <x-modal.card align="center" title="Update Assets" z-index="z-40" max-width="lg" wire:model.defer="edit_modal">
      <div class="grid grid-cols-2 gap-3">
        <div class="col-span-2">
          <x-input wire:model.defer="asset_name" label="Asset name" placeholder="" />
        </div>
        <div class="col-span-2">
          <x-textarea wire:model.defer="asset_description" label="Description" placeholder="Describe the asset" />
        </div>
        <x-input wire:model.defer="asset_price" label="Price" suffix="₱" />
        <x-input wire:model.defer="asset_serial_number" label="Serial Number" />
        <div class="col-span-1">

          <x-native-select label="Select remarks" wire:model="asset_remarks">
            <option selected hidden value="">----------</option>
            <option value="1">Brand New</option>
            <option value="2">Functional</option>
            <option value="3">Unfunctional</option>
            <option value="4">Slightly Damage</option>
            <option value="5">Damage</option>
          </x-native-select>
          @if ($asset_remarks == 4 || $asset_remarks == 5)
            <div class="mt-2">
              <x-textarea wire:model.defer="remarks_reason" label="Reason" placeholder="reasons of the asset" />
            </div>
          @endif
        </div>
        <div class="col-span-1">
          <x-native-select label="Category" wire:model.defer="asset_category">
            <option seleted hidden>Select Category</option>
            @foreach ($categories as $item)
              <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
          </x-native-select>
          <div class="mt-4">
            <x-checkbox id="right-label" label="Is Bundle" wire:model="isBundle" />
            @if ($isBundle)
              <div class="mt-3">
                <x-inputs.number label="Quantity" wire:model.defer="asset_quantity" />
              </div>
            @endif

          </div>
        </div>


      </div>

      <x-slot name="footer">
        <div class="flex justify-end space-x-1">
          <x-button label="Close" xs default x-on:click="close" />
          <x-button label="Update" xs spinner="updateAsset" positive wire:click="updateAsset" />
        </div>
      </x-slot>
    </x-modal.card>

  </div>
