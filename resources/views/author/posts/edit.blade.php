<x-author-layout>

    <div class="py-12 text-center mb-5 mt-5 w-50 mx-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Edit Post
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="d-flex justify-content-end p-2 mx-5">
        <a
            href="{{route('author.posts.index')}}"
            class="px-4 py-2 text-light btn btn-success text-decoration-none rounded">
            All Posts
        </a>
    </div>
    <div class="m-2 px-5">
        <form action="{{route('author.posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title </label>
                <input type="text" class="form-control" id="title" name="title"
                       value="{{$post->title}}"
                >

            </div>


            <div class="form-group">

                <div class="w-50"><img
                        class="img-thumbnail  w-25"
                        src="/storage/{{!empty($post->image)?$post->image : 'noImage.jpg'}}"
                    >
                </div>
                <label for="image"
                       class="form-label"
                >Image</label>
                <br>
                <input type="file" class="form-control-file" id="image"
                       accept="image/*"
                       name="image"
                >
            </div>

            <br>
            <br>
            <div class="form-group">
                <label for="description">Post text</label>
                <textarea class="form-control" id="description" rows="15"
                          name="description"
                >{{$post->description}}</textarea>
            </div>

            <div class="form-group my-5">
                <label for="tags">Tags</label>
                <br>
                <select multiple
                        class="form-select"
                        id="tags"
                        name="tags[]">

                    @foreach($tags as $tag)
                        <option
                            value="{{$tag->id}}"
                            @selected($post->tags->contains($tag))
                        >
                            {{$tag->name}}
                        </option>
                    @endforeach

                </select>
            </div>

            <button type="submit" class="btn btn-primary my-5 mx-auto d-block">Update post</button>


        </form>

    </div>


</x-author-layout>
