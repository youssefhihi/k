<x-client-layout>
@section('header')
    <x-client.navbar page="books" /> 
    @endsection
    <div class="w-11/12 m-auto mt-10 flex flex-col gap-5">
        <div class="flex space-x-10 w-full bg-white rounded-md p-5">
                <a href="" class="w-1/4">
                    <img src="book1.png" alt="">
                </a>
                <div class="flex flex-col gap-5  w-3/4">
                    <div class="flex flex-col gap-4">
                        <p class="text-3xl font-bold text-center">Neurologist And Nerves</p>
                        <p class="text-xl font-medium  px-4">Author : <span class="text-gray-700  font-normal hover:underline">Harper Rusu</span></p>
                        <p class="text-xl  font-medium px-4">Genre: <span class="text-gray-700 font-normal hover:underline">Horror</span></p> 
                        <div class="flex justify-between max-w-xl">
                            <p class="text-xl  font-medium px-4">Publication Date: <span class="text-gray-700 font-normal ">2020-32-09</span></p> 
                            <p class="text-xl  font-medium px-4">Edition: <span class="text-gray-700 font-normal ">2020</span></p> 
                        </div>
                        <div class="flex justify-between max-w-xl">
                            <p class="text-xl  font-medium px-4">Number of pages: <span class="text-gray-700 font-normal ">208 pages</span></p> 
                            <p class="text-xl  font-medium px-4">Language: <span class="text-gray-700 font-normal ">English</span></p> 
                        </div>
                        <p class="text-xl font-medium px-4">Description: <span class="text-gray-700 font-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, delectus magnam reiciendis excepturi facere sit? In dignissimos sequi dicta molestias quas fuga nobis voluptate molestiae rem, a voluptatem nulla at.</span></p> 

                    </div>    
                    <div class="flex justify-between px-10 ">
                        <div class="flex space-x-3">
                            <div class="flex text-xl p-1 gap-1 text-yellow-600">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half  "></i>
                            </div>                            
                            <p >12<span class="text-sm font-semibold"> reviews</span> </p>
                        </div>
                    
                    <div class="flex justify-end ">
                        <button class="bg-black text-white border-xl flex space-x-2 rounded-xl py-2 px-8">
                           <i class="fas fa-shopping-basket mt-1"></i> <span>Add to cart</span>
                        </button>
                    </div>
                </div>
                </div>
            </div>
    <div class="w-11/12 m-auto mt-20 flex justify-evenly">
    <x-client.articles-bookPage/>
    <x-client.side-cards/>
</div></div>
</x-client-layout>