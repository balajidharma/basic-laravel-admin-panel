<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Tailwind</title>



    <link rel="stylesheet" href="{{asset('css/frontend/main.css')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

</head>

<body>


@include('frontend/layouts/header')
@include('frontend/layouts/navebare')

<!-- banner -->
<div class="bg-cover bg-no-repeat bg-center py-36" style="background-image: url('assets/images/banner-bg.jpg');">
    <div class="container">
        <h1 class="text-6xl text-gray-800 font-medium mb-4 capitalize">
            best collection for <br> home decoration
        </h1>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam <br>
            accusantium perspiciatis, sapiente
            magni eos dolorum ex quos dolores odio</p>
        <div class="mt-12">
            <a href="#" class="bg-primary border border-primary text-white px-8 py-3 font-medium
                    rounded-md hover:bg-transparent hover:text-primary">Shop Now</a>
        </div>
    </div>
</div>
<!-- ./banner -->

<!-- features -->
<div class="container py-16">
    <div class="w-10/12 grid grid-cols-3 gap-6 mx-auto justify-center">
        <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
            <img src="assets/images/icons/delivery-van.svg" alt="Delivery" class="w-12 h-12 object-contain">
            <div>
                <h4 class="font-medium capitalize text-lg">Free Shipping</h4>
                <p class="text-gray-500 text-sm">Order over $200</p>
            </div>
        </div>
        <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
            <img src="assets/images/icons/money-back.svg" alt="Delivery" class="w-12 h-12 object-contain">
            <div>
                <h4 class="font-medium capitalize text-lg">Money Rturns</h4>
                <p class="text-gray-500 text-sm">30 days money returs</p>
            </div>
        </div>
        <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
            <img src="assets/images/icons/service-hours.svg" alt="Delivery" class="w-12 h-12 object-contain">
            <div>
                <h4 class="font-medium capitalize text-lg">24/7 Support</h4>
                <p class="text-gray-500 text-sm">Customer support</p>
            </div>
        </div>
    </div>
</div>
<!-- ./features -->

<!-- categories -->
<div class="container py-16">
    <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">shop by category</h2>
    <div class="grid grid-cols-3 gap-3">
        <div class="relative rounded-sm overflow-hidden group">
            <img src="assets/images/category/category-1.jpg" alt="category 1" class="w-full">
            <a href="#"
               class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Bedroom</a>
        </div>
        <div class="relative rounded-sm overflow-hidden group">
            <img src="assets/images/category/category-2.jpg" alt="category 1" class="w-full">
            <a href="#"
               class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Mattrass</a>
        </div>
        <div class="relative rounded-sm overflow-hidden group">
            <img src="assets/images/category/category-3.jpg" alt="category 1" class="w-full">
            <a href="#"
               class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Outdoor
            </a>
        </div>
        <div class="relative rounded-sm overflow-hidden group">
            <img src="assets/images/category/category-4.jpg" alt="category 1" class="w-full">
            <a href="#"
               class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Sofa</a>
        </div>
        <div class="relative rounded-sm overflow-hidden group">
            <img src="assets/images/category/category-5.jpg" alt="category 1" class="w-full">
            <a href="#"
               class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Living
                Room</a>
        </div>
        <div class="relative rounded-sm overflow-hidden group">
            <img src="assets/images/category/category-6.jpg" alt="category 1" class="w-full">
            <a href="#"
               class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Kitchen</a>
        </div>
    </div>
</div>
<!-- ./categories -->

<!-- new arrival -->
<div class="container pb-16">
    <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">top new arrival</h2>
    <div class="grid grid-cols-4 gap-6">
        <div class="bg-white shadow rounded overflow-hidden group">
            <div class="relative">
                <img src="assets/images/products/product1.jpg" alt="product 1" class="w-full">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                       title="view product">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                       title="add to wishlist">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                </div>
            </div>
            <div class="pt-4 pb-3 px-4">
                <a href="#">
                    <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">Guyer
                        Chair</h4>
                </a>
                <div class="flex items-baseline mb-1 space-x-2">
                    <p class="text-xl text-primary font-semibold">$45.00</p>
                    <p class="text-sm text-gray-400 line-through">$55.90</p>
                </div>
                <div class="flex items-center">
                    <div class="flex gap-1 text-sm text-yellow-400">
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                    </div>
                    <div class="text-xs text-gray-500 ml-3">(150)</div>
                </div>
            </div>
            <a href="#"
               class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                to cart</a>
        </div>
        <div class="bg-white shadow rounded overflow-hidden group">
            <div class="relative">
                <img src="assets/images/products/product4.jpg" alt="product 1" class="w-full">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                       title="view product">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                       title="add to wishlist">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                </div>
            </div>
            <div class="pt-4 pb-3 px-4">
                <a href="#">
                    <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">Bed
                        King Size</h4>
                </a>
                <div class="flex items-baseline mb-1 space-x-2">
                    <p class="text-xl text-primary font-semibold">$45.00</p>
                    <p class="text-sm text-gray-400 line-through">$55.90</p>
                </div>
                <div class="flex items-center">
                    <div class="flex gap-1 text-sm text-yellow-400">
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                    </div>
                    <div class="text-xs text-gray-500 ml-3">(150)</div>
                </div>
            </div>
            <a href="#"
               class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                to cart</a>
        </div>
        <div class="bg-white shadow rounded overflow-hidden group">
            <div class="relative">
                <img src="assets/images/products/product2.jpg" alt="product 1" class="w-full">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                       title="view product">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                       title="add to wishlist">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                </div>
            </div>
            <div class="pt-4 pb-3 px-4">
                <a href="#">
                    <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                        Couple Sofa</h4>
                </a>
                <div class="flex items-baseline mb-1 space-x-2">
                    <p class="text-xl text-primary font-semibold">$45.00</p>
                    <p class="text-sm text-gray-400 line-through">$55.90</p>
                </div>
                <div class="flex items-center">
                    <div class="flex gap-1 text-sm text-yellow-400">
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                    </div>
                    <div class="text-xs text-gray-500 ml-3">(150)</div>
                </div>
            </div>
            <a href="#"
               class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                to cart</a>
        </div>
        <div class="bg-white shadow rounded overflow-hidden group">
            <div class="relative">
                <img src="assets/images/products/product3.jpg" alt="product 1" class="w-full">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                       title="view product">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                       title="add to wishlist">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                </div>
            </div>
            <div class="pt-4 pb-3 px-4">
                <a href="#">
                    <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                        Mattrass X</h4>
                </a>
                <div class="flex items-baseline mb-1 space-x-2">
                    <p class="text-xl text-primary font-semibold">$45.00</p>
                    <p class="text-sm text-gray-400 line-through">$55.90</p>
                </div>
                <div class="flex items-center">
                    <div class="flex gap-1 text-sm text-yellow-400">
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                    </div>
                    <div class="text-xs text-gray-500 ml-3">(150)</div>
                </div>
            </div>
            <a href="#"
               class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                to cart</a>
        </div>
    </div>
</div>
<!-- ./new arrival -->

<!-- ads -->
<div class="container pb-16">
    <a href="#">
        <img src="assets/images/offer.jpg" alt="ads" class="w-full">
    </a>
</div>
<!-- ./ads -->

<!-- product -->
<div class="container pb-16">
    <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">recomended for you</h2>
    <div class="grid grid-cols-4 gap-6">
        <div class="bg-white shadow rounded overflow-hidden group">
            <div class="relative">
                <img src="assets/images/products/product1.jpg" alt="product 1" class="w-full">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                       title="view product">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                       title="add to wishlist">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                </div>
            </div>
            <div class="pt-4 pb-3 px-4">
                <a href="#">
                    <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">Guyer
                        Chair</h4>
                </a>
                <div class="flex items-baseline mb-1 space-x-2">
                    <p class="text-xl text-primary font-semibold">$45.00</p>
                    <p class="text-sm text-gray-400 line-through">$55.90</p>
                </div>
                <div class="flex items-center">
                    <div class="flex gap-1 text-sm text-yellow-400">
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                    </div>
                    <div class="text-xs text-gray-500 ml-3">(150)</div>
                </div>
            </div>
            <a href="#"
               class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                to cart</a>
        </div>
        <div class="bg-white shadow rounded overflow-hidden group">
            <div class="relative">
                <img src="assets/images/products/product4.jpg" alt="product 1" class="w-full">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                       title="view product">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                       title="add to wishlist">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                </div>
            </div>
            <div class="pt-4 pb-3 px-4">
                <a href="#">
                    <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">Bed
                        King Size</h4>
                </a>
                <div class="flex items-baseline mb-1 space-x-2">
                    <p class="text-xl text-primary font-semibold">$45.00</p>
                    <p class="text-sm text-gray-400 line-through">$55.90</p>
                </div>
                <div class="flex items-center">
                    <div class="flex gap-1 text-sm text-yellow-400">
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                    </div>
                    <div class="text-xs text-gray-500 ml-3">(150)</div>
                </div>
            </div>
            <a href="#"
               class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                to cart</a>
        </div>
        <div class="bg-white shadow rounded overflow-hidden group">
            <div class="relative">
                <img src="assets/images/products/product2.jpg" alt="product 1" class="w-full">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                       title="view product">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                       title="add to wishlist">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                </div>
            </div>
            <div class="pt-4 pb-3 px-4">
                <a href="#">
                    <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                        Couple Sofa</h4>
                </a>
                <div class="flex items-baseline mb-1 space-x-2">
                    <p class="text-xl text-primary font-semibold">$45.00</p>
                    <p class="text-sm text-gray-400 line-through">$55.90</p>
                </div>
                <div class="flex items-center">
                    <div class="flex gap-1 text-sm text-yellow-400">
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                    </div>
                    <div class="text-xs text-gray-500 ml-3">(150)</div>
                </div>
            </div>
            <a href="#"
               class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                to cart</a>
        </div>
        <div class="bg-white shadow rounded overflow-hidden group">
            <div class="relative">
                <img src="assets/images/products/product3.jpg" alt="product 1" class="w-full">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                       title="view product">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                       title="add to wishlist">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                </div>
            </div>
            <div class="pt-4 pb-3 px-4">
                <a href="#">
                    <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                        Mattrass X</h4>
                </a>
                <div class="flex items-baseline mb-1 space-x-2">
                    <p class="text-xl text-primary font-semibold">$45.00</p>
                    <p class="text-sm text-gray-400 line-through">$55.90</p>
                </div>
                <div class="flex items-center">
                    <div class="flex gap-1 text-sm text-yellow-400">
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                    </div>
                    <div class="text-xs text-gray-500 ml-3">(150)</div>
                </div>
            </div>
            <a href="#"
               class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                to cart</a>
        </div>
        <div class="bg-white shadow rounded overflow-hidden group">
            <div class="relative">
                <img src="assets/images/products/product1.jpg" alt="product 1" class="w-full">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                       title="view product">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                       title="add to wishlist">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                </div>
            </div>
            <div class="pt-4 pb-3 px-4">
                <a href="#">
                    <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">Guyer
                        Chair</h4>
                </a>
                <div class="flex items-baseline mb-1 space-x-2">
                    <p class="text-xl text-primary font-semibold">$45.00</p>
                    <p class="text-sm text-gray-400 line-through">$55.90</p>
                </div>
                <div class="flex items-center">
                    <div class="flex gap-1 text-sm text-yellow-400">
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                    </div>
                    <div class="text-xs text-gray-500 ml-3">(150)</div>
                </div>
            </div>
            <a href="#"
               class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                to cart</a>
        </div>
        <div class="bg-white shadow rounded overflow-hidden group">
            <div class="relative">
                <img src="assets/images/products/product4.jpg" alt="product 1" class="w-full">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                       title="view product">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                       title="add to wishlist">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                </div>
            </div>
            <div class="pt-4 pb-3 px-4">
                <a href="#">
                    <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">Bed
                        King Size</h4>
                </a>
                <div class="flex items-baseline mb-1 space-x-2">
                    <p class="text-xl text-primary font-semibold">$45.00</p>
                    <p class="text-sm text-gray-400 line-through">$55.90</p>
                </div>
                <div class="flex items-center">
                    <div class="flex gap-1 text-sm text-yellow-400">
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                    </div>
                    <div class="text-xs text-gray-500 ml-3">(150)</div>
                </div>
            </div>
            <a href="#"
               class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                to cart</a>
        </div>
        <div class="bg-white shadow rounded overflow-hidden group">
            <div class="relative">
                <img src="assets/images/products/product2.jpg" alt="product 1" class="w-full">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                       title="view product">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                       title="add to wishlist">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                </div>
            </div>
            <div class="pt-4 pb-3 px-4">
                <a href="#">
                    <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                        Couple Sofa</h4>
                </a>
                <div class="flex items-baseline mb-1 space-x-2">
                    <p class="text-xl text-primary font-semibold">$45.00</p>
                    <p class="text-sm text-gray-400 line-through">$55.90</p>
                </div>
                <div class="flex items-center">
                    <div class="flex gap-1 text-sm text-yellow-400">
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                    </div>
                    <div class="text-xs text-gray-500 ml-3">(150)</div>
                </div>
            </div>
            <a href="#"
               class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                to cart</a>
        </div>
        <div class="bg-white shadow rounded overflow-hidden group">
            <div class="relative">
                <img src="assets/images/products/product3.jpg" alt="product 1" class="w-full">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                       title="view product">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                       title="add to wishlist">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                </div>
            </div>
            <div class="pt-4 pb-3 px-4">
                <a href="#">
                    <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                        Mattrass X</h4>
                </a>
                <div class="flex items-baseline mb-1 space-x-2">
                    <p class="text-xl text-primary font-semibold">$45.00</p>
                    <p class="text-sm text-gray-400 line-through">$55.90</p>
                </div>
                <div class="flex items-center">
                    <div class="flex gap-1 text-sm text-yellow-400">
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                    </div>
                    <div class="text-xs text-gray-500 ml-3">(150)</div>
                </div>
            </div>
            <a href="#"
               class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                to cart</a>
        </div>
    </div>
</div>
<!-- ./product -->

<!-- footer -->
<footer class="bg-white pt-16 pb-12 border-t border-gray-100">
    <div class="container grid grid-cols-3">
        <div class="col-span-1 space-y-8">
            <img src="assets/images/logo.svg" alt="logo" class="w-30">
            <div class="mr-2">
                <p class="text-gray-500">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, hic?
                </p>
            </div>
            <div class="flex space-x-6">
                <a href="#" class="text-gray-400 hover:text-gray-500"><i
                        class="fa-brands fa-facebook-square"></i></a>
                <a href="#" class="text-gray-400 hover:text-gray-500"><i
                        class="fa-brands fa-instagram-square"></i></a>
                <a href="#" class="text-gray-400 hover:text-gray-500"><i
                        class="fa-brands fa-twitter-square"></i></a>
                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <i class="fa-brands fa-github-square"></i>
                </a>
            </div>
        </div>

        <div class="col-span-2 grid grid-cols-2 gap-8">
            <div class="grid grid-cols-2 gap-8">
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Solutions</h3>
                    <div class="mt-4 space-y-4">
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Marketing</a>
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Analitycs</a>
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Commerce</a>
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Insights</a>
                    </div>
                </div>

                <div>
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Support</h3>
                    <div class="mt-4 space-y-4">
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Pricing</a>
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Documentation</a>
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Guides</a>
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">API Status</a>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-8">
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Solutions</h3>
                    <div class="mt-4 space-y-4">
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Marketing</a>
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Analitycs</a>
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Commerce</a>
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Insights</a>
                    </div>
                </div>

                <div>
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Support</h3>
                    <div class="mt-4 space-y-4">
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Pricing</a>
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Documentation</a>
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Guides</a>
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">API Status</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ./footer -->

<!-- copyright -->
<div class="bg-gray-800 py-4">
    <div class="container flex items-center justify-between">
        <p class="text-white">&copy; TailCommerce - All Right Reserved</p>
        <div>
            <img src="assets/images/methods.png" alt="methods" class="h-5">
        </div>
    </div>
</div>
<!-- ./copyright -->
</body>

</html>
