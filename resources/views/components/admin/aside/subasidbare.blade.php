<li>
    <a href="{{$route??''}}" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium hover:bg-gray-200  focus:shadow-outline"
       onclick="dropdown()"
    >
                    <span class="text-gray-600">
                        {{$slot??''}}
                    </span>
        <span>{{$title??''}}</span>
        <span class="text-sm rotate-180" id="arrow">
          <i class="bi bi-chevron-down"></i>
        </span>
    </a>
    <ul class="text-left text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold"  id="submenu" >
        {{$submenu??''}}
    </ul>
</li>
