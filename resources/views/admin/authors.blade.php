
<x-admin-layout>
    <!-- CONTENT -->  
    <x-success-alert/>
    <x-error-alert :messages="$errors->all()" />

 <title-pages name="authors"/>
            <livewire:search-author />

            <div id="addAuthor" class="hidden min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
            <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
            <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
                                    <!-- Form to add Author -->
                    <form method="POST" id="authorForm" action="{{route('authors.store') }}" class="space-y-4" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                        <div class="flex flex-col gap-5">
                            <x-image-input path="{{asset('imgs/manAuthor.png')}}" page="author" class="h-16 w-16 object-cover rounded-full"/> 
                        <div class="flex flex-col">                
                            <label for="name" class="text-md font-semibold font-normal mb-1 px-4"> new Author</label>
                            <x-input id="author" class="block mt-1 w-full" type="text" name="name" :value="old('name')" />
                            <p id="messageError" class="hidden text-red-400 text-sm">Invalid name format ,Please use letters only.</p>
                            <select name="gender" id="" class="block mt-3 w-full rounded-xl py-2 focus:outline-none border border-gray-600 px-5">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <div class="flex space-x-8 justify-end mt-5">
                                <p onclick="closeAddAuthor()" class=" cursor-pointer mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-1 text-sm shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-red-600"> Close</p>
                                <button type="submit" class="cursor-pointer mb-2 md:mb-0 bg-gray-900 border border-gray-500 px-5 py-1 text-sm shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-gray-700">Save</button>
                            </div>
                        </div> 
                    </div>
                </form>
            </div>
        </div>
        
        @if (session('error'))
        <script>
            swal("Success", "{{ session('error') }}", 'error', {
                button: true,
                button: "ok",
                // timer:3000,
            });
            </script>
            @endif
            
           

</x-admin-layout>