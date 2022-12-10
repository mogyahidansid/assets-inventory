<div x-data="{ notifModal: false }">
  <button @click="notifModal = true"
    class="bg-gray-300 hover:bg-green-500 hover:fill-white fill-gray-700 h-8 grid place-content-center rounded-xl w-8 relative">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
      <path fill="none" d="M0 0h24v24H0z" />
      <path d="M22 20H2v-2h1v-6.969C3 6.043 7.03 2 12 2s9 4.043 9 9.031V18h1v2zM9.5 21h5a2.5 2.5 0 1 1-5 0z" />
    </svg>

    <div class="absolute h-5 w-5 -top-1 -right-1 bg-red-500 rounded-full text-white grid place-content-center p-2">
      <span class="text-sm">{{ auth()->user()->unreadNotifications->count() }}</span>
    </div>
  </button>

  <!-- Notifications Container -->
  <div class="bg-white w-[25rem] absolute top-14 right-5 max-h-[20rem] rounded-md border shadow" x-show="notifModal"
    x-cloak @click.away="notifModal = false">
    <section class="flex items-center justify-between p-3">
      <div class="relative">
        <h1>Notifications</h1>
      </div>
      <button class="text-sm text-cgreen/80 hover:text-cgreen underline">Mark all as read</button>
    </section>

    <div class="mt-1 divide-y">
      @forelse (auth()->user()->unreadNotifications as $notification)
        <button class="bg-gray-100 w-full py-2.5 px-3 text-left">
          <div class="flex items-center space-x-2">
            @php
              $user = App\Models\User::where('id', $notification->data['employeeId'])->first()->employeeInformation;
            @endphp
            <x-avatar md label="{{ $user->firstname[0] }} {{ $user->lastname[0] }}" />
            <div class="font-normal leading-5">
              <h1>{{ $notification->data['message'] }} Assets.</h1>
              <p class="text-gray-400 text-sm">
                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $notification->created_at)->diffForHumans() }}
              </p>
            </div>
          </div>
        </button>
      @empty
        <div class="py-5 text-center">
          <span class="text-gray-500">No Notification yet</span>
        </div>
      @endforelse
      {{-- <button class="bg-white w-full py-2.5 px-3 text-left">
                <div class="flex items-center space-x-2">
    
                    <img src="https://faces-img.xcdn.link/image-lorem-face-6688.jpg" alt="" class="w-10 h-10 rounded-lg">
                    <div class="font-normal leading-5">
                        <h1>Johnrey Supot is requesting an Asset.</h1>
                        <p class="text-gray-400 text-sm">4h ago</p>
                    </div>
                </div>
            </button> --}}
    </div>
  </div>
</div>
