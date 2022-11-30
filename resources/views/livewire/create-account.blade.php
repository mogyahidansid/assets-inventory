<div class="bg-white relative w-5/12 xl:w-6/12 p-5 border shadow-lg">
  <header>
    <h1 class="text-2xl text-green-700 uppercase font-black ">Create New Account</h1>
    <h1 class="leading-1 ml-2 text-sm text-gray-500">Please fill-in all the inputs.</h1>
  </header>
  <div class="mt-10 ">
    <div class="grid grid-cols-3 gap-4">
      <x-input wire:model.defer="firstname" label="First Name" />
      <x-input wire:model.defer="middlename" label="Middle Name" />
      <x-input wire:model.defer="lastname" label="Last Name" />
      <div class="col-span-2">
        <x-input wire:model.defer="address" label="Address" />
      </div>
      <x-input wire:model.defer="contact" label="Phone Number" />
    </div>
  </div>
  <div class="mt-3 py-3 border-t grid grid-cols-2 gap-4">
    <x-input wire:model.defer="username" label="Username" />
    <x-input wire:model.defer="email" label="Email" suffix="@" />
    <x-inputs.password wire:model.defer="password" label="Password" />
    <x-inputs.password wire:model.defer="confirm_password" label="Confirm Password" />

  </div>

  <div class="mt-12 flex justify-end space-x-2">
    <x-button href="{{ route('login') }}" label="Back to login" />
    <x-button wire:click="create" label="CREATE" right-icon="arrow-narrow-right" positive class="font-medium" />
  </div>
</div>
