<x-author-layout>

    <div class="py-12 text-center mb-5 mt-5 w-50 mx-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Edit Tag
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
            href="{{route('admin.tags.index')}}"
            class="px-4 py-2 text-light btn btn-success text-decoration-none rounded">
            All Tags
        </a>
    </div>
    <div class="m-2 px-5 w-50 mx-auto">
        <form action="{{route('admin.tags.update', $tag->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label text-center">Name </label>
                <input type="text" class="form-control" id="name" name="name"
                       value="{{$tag->name}}"
                >
            </div>
            <button type="submit" class="btn btn-primary my-5 mx-auto d-block">Update tag</button>

        </form>

    </div>


</x-author-layout>
