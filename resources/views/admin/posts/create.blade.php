<x-admin-master>
    @section('content')
        <h1>Create</h1>
        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="" placeholder="Enter title" aria-describedby=""
                       class="form-control">
            </div>
            <div class="form-group">
                <label for="file">File</label>
                <input type="file" name="post_image" id="post_image" class="form-control-file">
            </div>
            <div class="form-group">
                <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
    @endsection
</x-admin-master>
