<form method="GET" id="searchForm"  action="{{ $action }}">
    <div class="py-2 flex">
        <div class="flex pl-2">
            <input type="search" name="search" value="{{ request()->input('search') }}"
                   class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                   placeholder="Search" onkeyup="searchTable()">
{{--            <button type='submit' class='ml-4 inline-flex items-center px-4 py-2--}}
{{--            bg-green-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase--}}
{{--            tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900--}}
{{--            focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150'>--}}
{{--                {{ __('Search') }}--}}
{{--            </button>--}}
        </div>
    </div>
</form>
