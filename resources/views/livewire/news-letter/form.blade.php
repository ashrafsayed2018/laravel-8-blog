<div class="mb-4">
    <x-ui.alerts />
    <form wire:submit.prevent="formSubmit">
      <div class="container max-w-xl mx-auto space-y-4 text-right">
              {{-- name --}}
              <div >
                <x-jet-label for="name" value="{{ __('الاسم') }}" class="mb-4 font-bold text-white" />
                <x-jet-input name="name" wire:model="name" id="name" class="block mt-1 w-full" type="text" />
                <x-jet-input-error for="name" class="mt-2" />
            </div>
            {{-- email --}}
            <div >
                <x-jet-label for="email" value="{{ __('الايميل') }}" class="mb-4 font-bold text-white" />
                <x-jet-input email="email" wire:model="email" id="email" class="block mt-1 w-full" type="text" />
                <x-jet-input-error for="email" class="mt-2" />

                {{ $email }}
            </div>
         {{-- submit button --}}
         <div>
            <x-jet-button class="mt-4">اشتراك </x-jet-button>
         </div>
      </div>
    </form>
</div>

