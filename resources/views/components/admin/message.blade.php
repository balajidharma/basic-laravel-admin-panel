@if(session()->has('message'))
    <div class="mb-8 text-green-400 font-bold">
        {{ session()->get('message') }}
    </div>
@endif