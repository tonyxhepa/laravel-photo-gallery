<x-app-layout>
    <x-slot name="header">{{ $album->title }}</x-slot>
    <div class="container mx-auto flex justify-between m-2 p-2 bg-white shadow-md rounded-lg">
        <div class="m-2 p-2">
            <img src="{{ $image->getUrl() }}">
        </div>
        <div class="m-2 p-2">
            <ul>
                <li>Collection Name: {{ $image->collection_name }}</li>
                <li>Name: {{ $image->name }}</li>
                <li>Mime type: {{ $image->mime_type }}</li>
                <li>Size: {{ $image->human_readable_size }}</li>
            </ul>
        </div>
    </div>
</x-app-layout>