@if ($errors->any())
    <ul class="mt-3 list-none list-inside text-sm text-red-400">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif