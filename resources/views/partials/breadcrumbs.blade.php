
<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">



        @foreach ($breadcrumbs as $key=>$breadcrumb)
            @if ($key == 0)

                <li>
                    <div class="flex items-center">
                        <a href="{{ $breadcrumb->url }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-gray-800"> {{ $breadcrumb->title }}</a>
                    </div>
                </li>
            @else
                @if ($breadcrumb->url && !$loop->last )

                        <li>

                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <a href="{{ $breadcrumb->url }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-gray-800"> {{ $breadcrumb->title }}</a>
                            </div>
                        </li>


                @else

                     <li aria-current="page">

                         <div class="flex items-center">
                             <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                             <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400"> {{ $breadcrumb->title }}</span>
                         </div>
                     </li>
                @endif

            @endif

        @endforeach

    </ol>
</nav>
