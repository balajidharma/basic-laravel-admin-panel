<li>
    <a href="{{$route??''}}" class="dropdown-menubar flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium hover:bg-green-200  focus:shadow-outline ">
                    <span class="text-gray-600">
                        {{$slot??''}}
                    </span>
        <span>{{$title??''}}</span>
        <span class="text-sm rotate-180 arrow">
          <i class="bi bi-chevron-down"></i>
        </span>
    </a>

    <ul class="submenu-menubar text-left text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold {{$active??''}}"  >
        {{$submenu??''}}
    </ul>

</li>
