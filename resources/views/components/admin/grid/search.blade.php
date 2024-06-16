<form method="GET" action="{{ $action }}">
    <div class="py-2 flex flex-row-reverse">
        <div class="flex">
            <input type="search" name="search" value="{{ request()->input('search') }}" class="input input-bordered w-full max-w-xs" placeholder="{{ __('Search') }}">
            <button type='submit' class='ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>
                {{ __('Search') }}
            </button>
        </div>
    </div>
</form>
