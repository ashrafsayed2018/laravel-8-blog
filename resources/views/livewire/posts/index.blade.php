<div class="max-w-7xl mx-auto">
    <div class="bg-white overflow-auto shadow-xl sm:rounded-lg">

            {{-- main heading --}}

            <div class="w-full flex  space-x-2">

                {{-- search box --}}

                <div class="w-1/2 relative">
                    <span class="absolute z-10 left-4 items-center justify-center w-8 h-full py-3 pr-3 text-base font-normal leading-snug text-center text-gray-400 bg-transparent rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </span>
                    {{-- livewire search input --}}
                    <input type="text" wire:model.debounce.300ms="search" class="relative w-full px-6 py-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded shadow-inner outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-100" placeholder="بحث عن مقال">
                </div>

                      {{-- order by  --}}
                      <div class="relative w-1/6">
                        <select wire:model="orderBy" id="" class="relative w-full px-3 py-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded shadow-inner outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-100 text-center">
                            <option value="id">Id</option>
                            <option value="title">العنوان</option>
                            <option value="body">المحتوي</option>
                        </select>
                    </div>


                     {{-- order asc  --}}
                     <div class="relative w-1/6">
                        <select wire:model="orderAsc" id="" class="relative w-full px-3 py-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded shadow-inner outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-100 text-center">
                            <option value="1">تصاعدي</option>
                            <option value="0">تنازلي</option>
                        </select>
                    </div>

                    {{-- order per page  --}}
                    <div class="relative w-1/6">
                        <select wire:model="perPage" id="" class="relative w-full px-3 py-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded shadow-inner outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-100 text-center">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>

            </div>
             {{-- post table --}}
             <table class="w-full divide-y divide-gray-200">
               <thead class="font-bold text-gray-500 bg-indigo-200">
                   <tr>
                       <th class="px-2 py-3 text-xs tracking-wide text-right">

                       </th>
                       <th class="px-2 py-3 text-xs tracking-wide text-right">
                           مسلسل
                       </th>
                       <th class="px-2 py-3 text-xs tracking-wide text-right">
                           العنوان
                       </th>
                       <th class="px-2 py-3 text-xs tracking-wide text-right">
                           القسم
                       </th>
                       <th class="px-2 py-3 text-xs tracking-wide text-right">
                          مميز
                       </th>
                       <th class="px-2 py-3 text-xs tracking-wide text-right">
                           تاريخ الانشاء
                       </th>
                       <th class="px-2 py-3 text-xs tracking-wide text-right">
                           تاريخ التحديث
                       </th>
                       <th class="px-2 py-3 text-xs tracking-wide text-right">
                           الاعدادات
                       </th>
                   </tr>
               </thead>
               <tbody class="text-xs divide-y divide-gray-200 bg-indigo-50">

                   <?php $i = 1; ?>
                   @foreach ($posts as $post)
                   <tr>
                       <td></td>
                       <td class="px-2 py-4 whitespace-nowrap">
                           {{ $i++}}
                       </td>
                       <td class="px-2 py-4 whitespace-nowrap">
                           {{ Str::limit($post->title,40,'...')}}
                       </td>
                       <td class="px-2 py-4 whitespace-nowrap">
                         {{ $post->category->name }}
                       </td>
                       <td class="px-2 py-4 whitespace-nowrap">
                          مميز
                       </td>
                       <td class="px-2 py-4 whitespace-nowrap">
                           {{ $post->created_at->format("d/m/y") }}
                       </td>
                       <td class="px-2 py-4 whitespace-nowrap">
                           {{ $post->updated_at->format("d/m/y") }}
                       </td>
                       <td class="px-2 py-4 text-sm text-gray-500 whitespace-nowrap">
                           <div class="flex justify-start space-x-1">
                               <a href="{{ route("posts.edit", $post) }}" class="p-1 border-2 border-indigo-200 rounded-md">
                                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-500">
                                       <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                     </svg>

                               </a>
                               {{-- form --}}
                               <form action="{{ route("posts.delete",$post) }}" method="POST">
                                   @csrf
                                   @method("Delete")
                                   <button type="submit" class="p-1 border-2 border-red-200 rounded-md">
                                       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-red-500">
                                           <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                         </svg>

                                   </button>
                               </form>
                           </div>


                       </td>
                   </tr>
                   @endforeach
               </tbody>
             </table>

    </div>
</div>
