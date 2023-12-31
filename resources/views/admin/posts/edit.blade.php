<x-admin-master>
    @section('content')
        <h1>Edit a Post</h1>
        <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text"
                       name="title"
                       id="title"
                       placeholder="Enter title"
                       aria-describedby=""
                       class="form-control"
                       value="{{$post->title}}"
                >
            </div>
            <div class="form-group">
                <div><img height="100px" src="{{$post->post_image}}" alt=""></div>
                <label for="file">File</label>
                <input type="file" name="post_image" id="post_image" class="form-control-file">
            </div>
            <div class="form-group">
                <textarea name="body"
                          id="body"
                          cols="30"
                          rows="10"
                          class="form-control"
                          value=""
                >{{$post->body}}</textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
    @endsection
</x-admin-master>
