<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>{{ $post->title }}</h1>
                    <p>{{ $post->content }}</p>
                    <p>{{ $post->author }}</p>
                    <p>{{ $post->time }}</p>
                    @if($post->author_id == Auth::user()->id)
                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('post.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
