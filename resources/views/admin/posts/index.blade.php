@php use App\Models\User; @endphp
<x-admin-layout>

    <div class="py-12 text-center mb-5 mt-5 w-50 mx-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Posts index
                </div>
            </div>
        </div>
    </div>


    <div class="px-3 mt-5">
        <table class="table mt-3 text-center align-middle ">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Views</th>
                <th scope="col">Image</th>

                <th scope="col">Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>

                    <td><a
                            class="text-decoration-none text-black"
                            href="{{route('showPost', $post->id)}}">{{$post->title}}</a></td>


                    <td>{{User::find($post->user_id)->name}}</td>
                    <td>{{(int)$post->views}}</td>
                    <td class=""><img
                            class="img-thumbnail "
                            style="width: 12rem"
                            src="/storage/{{!empty($post->image)?$post->image : 'noImage.jpg'  }}"
                        >
                    </td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="d-flex justify-content-center">

                            <form method="POST" action="{{ route('admin.posts.destroy',$post->id) }}"
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

</x-admin-layout>
