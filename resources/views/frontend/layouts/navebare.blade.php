<!-- navbar -->
<nav class="bg-gray-800">
    <div class="container flex">
        <div class="px-8 py-4 bg-primary flex items-center cursor-pointer relative group">
                <span class="text-white">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z" fill="currentColor"/>
                        <path opacity="0.3" d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z" fill="currentColor"/>
                        <path opacity="0.3" d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z" fill="currentColor"/>
                        <path opacity="0.3" d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z" fill="currentColor"/>
                    </svg>
                </span>
            <span class="capitalize ml-2 text-white">All Categories</span>

            <!-- dropdown -->
            <div
                class="absolute w-full left-0 top-full bg-white shadow-md py-3 divide-y divide-gray-300 divide-dashed opacity-0 group-hover:opacity-100 transition duration-300 invisible group-hover:visible">

                @foreach($categories_products as $category)
                    <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                       @if(isset($category->image)) <img src="{{asset('storage/'.$category->image)}}" alt="sofa" class="w-5 h-5 object-contain"> @endif
                        <span class="ml-6 text-gray-600 text-sm">{{$category->name}}</span>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="flex items-center justify-between flex-grow pl-12">
            <div class="flex items-center space-x-6 capitalize">
                <a href="index.html" class="text-gray-200 hover:text-white transition">Home</a>
                <a href="pages/shop.html" class="text-gray-200 hover:text-white transition">Shop</a>
                <a href="#" class="text-gray-200 hover:text-white transition">About us</a>
                <a href="#" class="text-gray-200 hover:text-white transition">Contact us</a>
            </div>
            <a href="pages/login.html" class="text-gray-200 hover:text-white transition">Login</a>
        </div>
    </div>
</nav>
<!-- ./navbar -->
