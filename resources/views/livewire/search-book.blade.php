<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="flex justify-between p-2 items-center flex-row w-full bg-black rounded-md">
            <x-search-input/>
        <a href="{{route('books.create')}}" class="ml-3">
            <x-icon name="add"/>
        </a>
    </div> 
    <table class="min-w-full divide-y divide-gray-200 overflow-x-auto mt-10">
        <thead class="bg-gray-50">
            <tr>
                <x-table.th name="Book"/> 
                <x-table.th name="Genre"/> 
                <x-table.th name="Quantity"/> 
                <x-table.th name="Operations"/>                
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($books as $book)
            <x-table.tr>
                <x-table.td>
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-20 w-16">
                            <img class="h-20 w-16" src="{{asset('storage/'. $book->image->path)}}" alt="">
                        </div>
                        <div class="text-sm font-medium text-gray-900 ml-4">
                            {{$book->title}}
                        </div>
                    </div>
                </x-table.td>
                <x-table.td>{{$book->genre->name}} </x-table.td>              
                <x-table.td>{{$book->quantity}}</x-table.td>       
                <x-table.td>
                    <div class="flex justify-center space-x-3">
                        <form id="deleteBookForm{{$book->id}}" action="{{ route('books.destroy', $book) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="deleteBookButton" data-index="{{$book->id}}"><x-icon name="delete"/></button>
                        </form>  
                        <a href="{{route('books.edit',$book)}}"><x-icon name="update"/> </a> 
                        <a href="{{route('books.show',$book)}}"><x-icon name="details"/></a>
                    </div>  
                </x-table.td>           
            </x-table.tr>
            @empty
            <x-table.tr>
                <x-table.td>No books found</x-table.td>
            </x-table.tr>
            @endforelse
        </tbody>

<script>    
document.querySelectorAll('.deleteBookButton').forEach(button => {
  button.addEventListener('click', function() {
      console.log("Delete button clicked!");
      const bookID = this.getAttribute('data-index');
      if (confirm("Are you sure you want to delete this Book? ")) {
          document.getElementById('deleteBookForm' + bookID).submit();
      }
  });
});
</script>
    </table>

</div>