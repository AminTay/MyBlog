@php use App\Enums\Rule; @endphp
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


    <table class="table mt-5 text-center align-middle">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Post Numbers</th>
            <th scope="col">Rule</th>


        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>

                <td>{{ $user->rule == 'author' ? count($user->posts) : 'NaN'}}</td>
                <td>
                    <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <select name="rule" onchange="this.form.submit()">
                            @foreach(Rule::cases() as $rule)
                                <option
                                    value="{{$rule->value}}" @selected($rule->value == $user->rule)>{{$rule->name}}
                                </option>
                            @endforeach

                        </select>
                    </form>
                </td>

            {{--                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">--}}
            {{--                    <div class="d-flex justify-content-center">--}}

            {{--                        <form method="POST" action="{{ route('admin.users.destroy',$user->id) }}"--}}
            {{--                              onsubmit="return confirm('Are you sure?');">--}}
            {{--                            @csrf--}}
            {{--                            @method('DELETE')--}}
            {{--                            <button type="submit" class="btn btn-danger">Delete</button>--}}
            {{--                        </form>--}}
            {{--                    </div>--}}
            {{--                </td>--}}

            {{--            </tr>--}}
        @endforeach
        </tbody>
    </table>

</x-admin-layout>
