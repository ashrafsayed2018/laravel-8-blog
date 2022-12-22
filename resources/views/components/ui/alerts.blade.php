
@if(session()->has("success"))
    <div
    x-data="{open : true}"
    x-init="setTimeout(() => {open = false}, 3000)"
    x-show="open"
    x-transition:enter="transition duration-500 transform ease-out"
    x-transition:start="opacity-1"
    x-transition:leave="transiton duration-500 transform ease-in"
    x-transition:leave-end="opacity-0"
    class="flex items-center bg-green-600 p-2 mb-4 text-white rounded">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 pt-1 mr-3" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>

        <span class="inline-block mr-4">
            {{ session("success") }}
        </span>
    </div>
@endif
