<li>
    <a href="{{$route}}" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium hover:bg-gray-200  focus:shadow-outline">
                    <span class="text-gray-600">
                        {{$slot}}
                    </span>
        <span>{{$title}}</span>
        {{$arrow??''}}
    </a>
    {{$submenu??''}}
</li>
