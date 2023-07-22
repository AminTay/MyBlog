
<x-author-layout>

    <div class="py-12 text-center mb-5 mt-5 w-50 mx-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Posts index
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end p-2 mx-5">
        <a
            href="{{route('author.posts.create')}}"
            class="px-4 py-2 text-light btn btn-success text-decoration-none rounded">
            Create Post
        </a>
    </div>
    <div class="px-5">
        <table class="table mt-3 text-center align-middle">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>

                <th scope="col">Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}} </td>
                    </td>

                    <td class="w-50"><img
                            class="img-thumbnail  w-25"
                            src="/storage/{{!empty($post->image)?$post->image : 'noImage.jpg'  }}"
                        >
                    </td>

                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('author.posts.edit',$post->id) }}" class="btn btn-primary me-2">Edit</a>
                            <form method="POST" action="{{ route('author.posts.destroy',$post->id) }}"
                                  onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>
    </div>
</x-author-layout>

