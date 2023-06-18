<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('post.update', $post->id)}}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="title">Title</label><br>
                            <input class="form-control" type="text" name="title" id="title" value="{{old('title', $post->title)}}">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label><br>
                            <textarea class="form-control" name="content" id="content">{{old('content', $post->content)}}</textarea>
                        </div>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded mt-2" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>