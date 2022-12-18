<x-employee-layout>
  <div class="py-6">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
      <h1 class="text-2xl font-semibold text-gray-700 uppercase">Profile Management</h1>
    </div>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
      <!-- Replace with your content -->
      <div class="py-4">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
          @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            @livewire('profile.update-profile-information-form')

            <x-jet-section-border />
          @endif

          @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            <div class="mt-10 sm:mt-0">
              @livewire('profile.update-password-form')
            </div>

            <x-jet-section-border />
          @endif

          @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
            <div class="mt-10 sm:mt-0">
              @livewire('profile.two-factor-authentication-form')
            </div>

            <x-jet-section-border />
          @endif

          <div class="mt-10 sm:mt-0">
            @livewire('profile.logout-other-browser-sessions-form')
          </div>

          @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
              @livewire('profile.delete-user-form')
            </div>
          @endif
        </div>

      </div>
      <!-- /End replace -->
    </div>
  </div>
</x-employee-layout>
