<x-app-layout>
    <x-slot name="header">{{ $album->title }}</x-slot>
    <div class="container mx-auto m-2 p-2 bg-white shadow-md rounded-lg">
        <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
        <form method="POST" action="{{ route('ablums.upload', $album->id) }}" enctype="multipart/form-data">
          @csrf
          <div class="sm:col-span-6">
            <label for="title" class="block text-sm font-medium text-gray-700"> Album Image </label>
            <div class="mt-1">
              <input type="file" id="image" name="image" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
            </div>
          </div>
          <div class="sm:col-span-6 pt-5">
            <x-button class="bg-green-500">Upload</x-button>
          </div>
        </form>
       </div>
       <div class="mt-4">
         <div class="grid grid-cols-2 md:grid-cols-3 gap-2 md:gap-4">
           @foreach ($photos as $photo)
           <div class="bg-gray-300 p-2">
             <a class="block relative h-56 rounded overflow-hidden">
                <img 
                alt="gallery" 
                class="object-cover object-center w-full h-full block" 
                src="{{ $photo->getUrl('thumb') }}">
              </a>
              <div class="flex justify-between mt-4 p-4">
              <a class="m-2 p-2 bg-blue-500 hover:bg-blue-700 rounded-lg" href="{{ route('album.image.show', [$album->id, $photo->id]) }}">Full image</a>
              <form method="POST" action="{{ route('album.image.destroy', [$album->id, $photo->id]) }}">
                @csrf
                @method('DELETE')
                <button class="m-2 p-2 rounded-lg bg-red-500 hover:bg-red-700">Delete</button>  
              </form> 
            </div>
            </div>
           @endforeach
         </div>
       </div>
    </div>
</x-app-layout>