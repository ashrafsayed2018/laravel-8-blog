<div class="grid grid-col-4 gap-8">
    {{-- main content --}}
    <div class="col-span-3">
        @foreach ($posts as $post)
          <div class="bg-indigo">
              {{ $post->title }}
          </div>
        @endforeach
    </div>
    {{-- side navigation  --}}
    <aside class="space-y-8">
        {{-- sorting  --}}
        <div class="flex items-center">
            <h2>ترتيب : </h2>
            <div class="space-x-4">
                <button wire:click="sortBy('recentAsc')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sort-descending" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z"/>
                        <line x1="4" y1="6" x2="13" y2="6" />
                        <line x1="4" y1="12" x2="11" y2="12" />
                        <line x1="4" y1="18" x2="11" y2="18" />
                        <polyline points="15 15 18 18 21 15" />
                        <line x1="18" y1="6" x2="18" y2="18" />
                      </svg>

                </button>
                <button wire:click="sortBy('recentDesc')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sort-ascending" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z"/>
                        <line x1="4" y1="6" x2="11" y2="6" />
                        <line x1="4" y1="12" x2="11" y2="12" />
                        <line x1="4" y1="18" x2="13" y2="18" />
                        <polyline points="15 9 18 6 21 9" />
                        <line x1="18" y1="6" x2="18" y2="18" />
                      </svg>

                </button>
            </div>
        </div>
        {{-- categories --}}
        <div>
            <div class="bg-indigo-500 p-2 text-white">
                 <h2>الاقسام </h2>
            </div>
            @foreach ($categories as $category)
               <button wire:click="toggleCategory('{{ $category->id }}')">
                  {{ $category->name }}
               </button>
            @endforeach
        </div>
    </aside>
 </div>

