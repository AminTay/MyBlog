<x-author-layout>

    <div class="py-12 text-center mb-5 mt-5 w-50 mx-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Create Post
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end p-2 mx-5">
        <a
            href="{{route('author.tags.index')}}"
            class="px-4 py-2 text-light btn btn-success text-decoration-none rounded">
            All Tags
        </a>
    </div>
    <div class="m-2 px-5">
        <form action="{{route('author.tags.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title </label>
                <input type="text" class="form-control" id="title" name="title">

            </div>


            <div class="form-group">
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
                ></textarea>
            </div>

            <button type="submit" class="btn btn-primary my-5 mx-auto d-block">Create post</button>

        </form>

    </div>


</x-author-layout>
