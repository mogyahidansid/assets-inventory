<x-admin-layout>
  <div class="py-6">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
      <h1 class="text-2xl font-semibold text-gray-700 uppercase">Assets</h1>
    </div>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
      <!-- Replace with your content -->
      <div class="py-4">
        <div class="px-4 sm:px-6 lg:px-8">
          <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
              <div class="search flex items-center rounded-lg  px-3 py-1 w-72 border shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-gray-500" width="24"
                  height="24">
                  <path fill="none" d="M0 0h24v24H0z" />
                  <path
                    d="M11 2c4.968 0 9 4.032 9 9s-4.032 9-9 9-9-4.032-9-9 4.032-9 9-9zm0 16c3.867 0 7-3.133 7-7 0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7zm8.485.071l2.829 2.828-1.415 1.415-2.828-2.829 1.414-1.414z" />
                </svg>
                <input type="text" class="outline:none  h-8 focus:ring-0 flex-1 border-0 focus:border-0"
                  placeholder="Search asset...">
              </div>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none flex item-center space-x-1.5">
              <x-button icon="cog" />
              <x-button icon="plus" label="Add New" positive />
              <x-native-select wire:model="model">
                <option>Active</option>
                <option>Pending</option>
                <option>Stuck</option>
                <option>Done</option>
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
                          Name</th>
                        <th scope="col"
                          class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">
                          Description
                        </th>
                        <th scope="col"
                          class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">Quantity
                        </th>
                        <th scope="col"
                          class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">STATUS
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
                      <tr>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-500 sm:pl-6">Lindsay
                          Walton</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Front-end Developer</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">lindsay.walton@example.com</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><span
                            class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">Available</span>
                        </td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                          <span
                            class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">Badge</span>
                        </td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                          <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">,
                              Lindsay Walton</span></a>
                        </td>
                      </tr>

                      <!-- More people... -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- /End replace -->
    </div>
  </div>
</x-admin-layout>
