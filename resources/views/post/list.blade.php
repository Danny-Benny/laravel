<a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{route('post.create')}}">Add post</a>
<table class="table table-striped" style="width: 100%">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Time</th>
            <th scope="col">Author</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td><a style="text-decoration: underline;" href="{{route('post.show', $post->id)}}">{{ $post->title }}</a></td>
            <td>{{ $post->time }}</td>
            <td>{{ $post->author }}</td>
        </tr>
        @endforeach
    </tbody>
</table>