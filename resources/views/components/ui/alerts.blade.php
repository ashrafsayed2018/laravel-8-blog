
<div
x-data="{open: true}"
x-init="setTimeout(() => {open = false }, 3000)"
x-show="open"
x-transition:enter="transition duration-500 transform ease-out"
x-transition:enter-start="opacity-1"
x-transition:leave="transition durantion-500 transform ease-in"
x-transition:leave-end="opacity-0" class="flex items-center p-2 mb-4 text-white bg-green-600 rounded">
<svg xmlns="http://www.w3.org/2000/svg" class="w-5 pt-1 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>

<span>
    {{ session('success') }}
</span>
</div>

@if(session()->has("error"))
    <div
    x-data="{open: true}"
    x-init="setTimeout(() => {open = false }, 3000)"
    x-show="open"
    x-transition:enter="transition duration-500 transform ease-out"
    x-transition:enter-start="opacity-1"
    x-transition:leave="transition durantion-500 transform ease-in"
    x-transition:leave-end="opacity-0"
    class="flex items-center bg-red-400 p-2 mb-4 text-white rounded">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 pt-1 mr-3" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
        </svg>
        <span class="inline-block mr-4">
            {{ session("error") }}
        </span>
    </div>
@endif
