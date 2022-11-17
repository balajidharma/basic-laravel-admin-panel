@if(session()->has('message'))
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
        <span class="font-medium">
            {{ session()->get('message') }}
        </span>
    </div>
@endif