<x-dropdown>
                <!-- !!!!!!!!!!!!!!!! TRIGGER !!!!!!!!!!!!!!!!!!!!!! -->
                <x-slot name="trigger">
                    <!-- onclick show div contents and hide on click again-->
                    <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex max-h-10">

                        <!-- displays the current selected category else use categories -->
                        <!-- isset — Determine if a variable is declared and is different than null -->
                        {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}

                        <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22" height="22" viewBox="0 0 22 22"> -->
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path fill="#222" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                            </g>
                        </svg>
                    </button>

                    <!-- !!!!!!!!!!!!!!!!!!!! LINKS !!!!!!!!!!!!!! -->
                </x-slot>
                <a href="/" class="block text-left ml-3 text-sm leading-6 hover:bg-blue-300 focus:bg-blue-300 hover:text-white focus:text-white">
                    All</a>

                @foreach ($categories as $category)
                <a href="/?category={{ $category->slug }}" class="block text-left ml-3 text-sm leading-6 hover:bg-blue-300 
                    focus:bg-blue-300 hover:text-white focus:text-white
                    {{ isset($currentCategory) && $currentCategory->is($category) ? 'bg-blue-500 text-white' : '' }}
                    ">
                    {{$category->name}}</a>
                @endforeach
            </x-dropdown>