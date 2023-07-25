@php use App\Models\User; @endphp
<x-home-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-5 border rounded p-3 w-75">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex flex-column">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative flex-grow-1">
                    <div class="col p-4 d-flex flex-column position-static">

                        <h2 class="mb-1">{{$post->title}}</h2>
                        <h4 class="mb-1">By {{User::find($post->user_id)->name}}</h4>
                        <h4 class="mb-1">Views: {{(int) $post->views}}</h4>
                        <div class="mb-1 text-muted">{{$post->created_at->format('l, F j')}}</div>

                        <div class="container mt-3  text-center">
                            <div class="row">
                                @foreach($post->tags as $tag)
                                    <div class="col-12 col-sm-6 col-md-4 my-1 p-2">
                                        <a href="/"
                                           class="text-decoration-none text-dark">
                                            <div class="bg-success rounded-pill">#{{$tag->name}}</div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-6 d-flex flex-column">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative w-100 flex-grow-1">
                    <img
                        class="img-fluid "

                        src="/storage/{{!empty($post->image) ? $post->image : 'noImage.jpg'}}" class="w-100">

                </div>
            </div>
        </div>
        <div class="row mb-2 border rounded p-2">
            <h3 class="font-weight-bold text-primary text-muted"
                style="font-size: 24px; line-height: 1.5; font-family: sans-serif; white-space: pre-line;">
                {{$post->description}}
            </h3>
        </div>

    </div>

</x-home-layout>

