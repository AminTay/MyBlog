<x-admin-layout>

    <div class="py-12 text-center mb-5 mt-5 w-50 mx-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Users index
                </div>
            </div>
        </div>
    </div>


    <div class="d-flex justify-content-end p-2 mx-5">
        <a
            href="{{route('admin.users.create')}}"
            class="px-4 py-2 text-light btn btn-success text-decoration-none rounded">
            Create User
        </a>
    </div>

    <table class="table mt-5 text-center align-middle">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            <th scope="col">Options</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('admin.tags.edit',1) }}" class="btn btn-primary me-2">Edit</a>
                    <form method="POST" action="{{ route('admin.tags.edit',1) }}"
                          onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </td>

        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('admin.tags.edit',1) }}" class="btn btn-primary me-2">Edit</a>
                    <form method="POST" action="{{ route('admin.tags.edit',1) }}"
                          onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </td>

        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry the Bird</td>
            <td>@twitter</td>
            <td>@twitter</td>
            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('admin.tags.edit',1) }}" class="btn btn-primary me-2">Edit</a>
                    <form method="POST" action="{{ route('admin.tags.edit',1) }}"
                          onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </td>

        </tr>

        </tbody>
    </table>

</x-admin-layout>
