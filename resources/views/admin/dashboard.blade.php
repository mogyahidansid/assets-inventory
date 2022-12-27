<x-admin-layout>
  <div class="py-6">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
      <h1 class="text-2xl font-semibold text-gray-700 uppercase">Dashboard</h1>
    </div>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
      <!-- Replace with your content -->
      <div class="py-4">
        <div class="mt-8">
          <div class="mx-auto">
            <div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
              <!-- Card -->

              <div class="overflow-hidden rounded-lg bg-white border shadow">
                <div class="p-5">
                  <div class="flex items-center">
                    <div class="flex-shrink-0">
                      <!-- Heroicon name: outline/scale -->
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-7 w-7 fill-yellow-500">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path
                          d="M17.618 5.968l1.453-1.453 1.414 1.414-1.453 1.453a9 9 0 1 1-1.414-1.414zM11 8v6h2V8h-2zM8 1h8v2H8V1z" />
                      </svg>

                    </div>
                    <div class="ml-5 w-0 flex-1">
                      <dl>
                        <dt class="truncate text-sm font-medium text-gray-500">Total Pending Requests</dt>
                        <dd>
                          <div class="text-2xl font-medium text-gray-900">
                            {{ App\Models\Transaction::where('status', 1)->count() }}</div>
                        </dd>
                      </dl>
                    </div>
                  </div>
                </div>
                <div class="bg-gray-50 px-5 py-2">
                  <div class="text-sm">
                    <a href="#" class="font-medium text-cyan-700 hover:text-cyan-900">View all</a>
                  </div>
                </div>
              </div>



              <div class="overflow-hidden rounded-lg bg-white border shadow">
                <div class="p-5">
                  <div class="flex items-center">
                    <div class="flex-shrink-0">
                      <!-- Heroicon name: outline/scale -->
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-7 w-7 fill-green-700">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path
                          d="M2 9h3v12H2a1 1 0 0 1-1-1V10a1 1 0 0 1 1-1zm5.293-1.293l6.4-6.4a.5.5 0 0 1 .654-.047l.853.64a1.5 1.5 0 0 1 .553 1.57L14.6 8H21a2 2 0 0 1 2 2v2.104a2 2 0 0 1-.15.762l-3.095 7.515a1 1 0 0 1-.925.619H8a1 1 0 0 1-1-1V8.414a1 1 0 0 1 .293-.707z" />
                      </svg>

                    </div>
                    <div class="ml-5 w-0 flex-1">
                      <dl>
                        <dt class="truncate text-sm font-medium text-gray-500">Total Accepted Requests</dt>
                        <dd>
                          <div class="text-2xl font-medium text-gray-900">
                            {{ App\Models\Transaction::where('status', 2)->count() }}</div>
                        </dd>
                      </dl>
                    </div>
                  </div>
                </div>
                <div class="bg-gray-50 px-5 py-2">
                  <div class="text-sm">
                    <a href="#" class="font-medium text-cyan-700 hover:text-cyan-900">View all</a>
                  </div>
                </div>
              </div>
              <div class="overflow-hidden rounded-lg bg-white border shadow">
                <div class="p-5">
                  <div class="flex items-center">
                    <div class="flex-shrink-0">
                      <!-- Heroicon name: outline/scale -->
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-7 w-7 fill-red-700">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path
                          d="M22 15h-3V3h3a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1zm-5.293 1.293l-6.4 6.4a.5.5 0 0 1-.654.047L8.8 22.1a1.5 1.5 0 0 1-.553-1.57L9.4 16H3a2 2 0 0 1-2-2v-2.104a2 2 0 0 1 .15-.762L4.246 3.62A1 1 0 0 1 5.17 3H16a1 1 0 0 1 1 1v11.586a1 1 0 0 1-.293.707z" />
                      </svg>

                    </div>
                    <div class="ml-5 w-0 flex-1">
                      <dl>
                        <dt class="truncate text-sm font-medium text-gray-500">Total Declined Requests</dt>
                        <dd>
                          <div class="text-2xl font-medium text-gray-900">
                            {{ App\Models\Transaction::where('status', 3)->count() }}</div>
                        </dd>
                      </dl>
                    </div>
                  </div>
                </div>
                <div class="bg-gray-50 px-5 py-2">
                  <div class="text-sm">
                    <a href="#" class="font-medium text-cyan-700 hover:text-cyan-900">View all</a>
                  </div>
                </div>
              </div>

              <div class="overflow-hidden rounded-lg bg-white border shadow">
                <div class="p-5">
                  <div class="flex items-center">
                    <div class="flex-shrink-0">
                      <!-- Heroicon name: outline/scale -->
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-7 w-7 fill-gray-700">
                        <path fill="none" d="M0 0H24V24H0z" />
                        <path
                          d="M11 3c.552 0 1 .448 1 1v2h5c.552 0 1 .448 1 1v5h2c.552 0 1 .448 1 1v7c0 .552-.448 1-1 1h-7c-.552 0-1-.448-1-1v-2H7c-.552 0-1-.448-1-1v-5H4c-.552 0-1-.448-1-1V4c0-.552.448-1 1-1h7zm5 5h-4v3c0 .552-.448 1-1 1H8v4h4v-3c0-.552.448-1 1-1h3V8z" />
                      </svg>

                    </div>
                    <div class="ml-5 w-0 flex-1">
                      <dl>
                        <dt class="truncate text-sm font-medium text-gray-500">Total Returned Requests</dt>
                        <dd>
                          <div class="text-2xl font-medium text-gray-900 s">
                            {{ App\Models\Transaction::where('status', 4)->count() }}</div>
                        </dd>
                      </dl>
                    </div>
                  </div>
                </div>
                <div class="bg-gray-50 px-5 py-2">
                  <div class="text-sm">
                    <a href="#" class="font-medium text-cyan-700 hover:text-cyan-900">View all</a>
                  </div>
                </div>
              </div>


              <!-- More items... -->
            </div>
          </div>


        </div>
        <!-- /End replace -->
      </div>
    </div>
</x-admin-layout>
