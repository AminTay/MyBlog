<?php use App\Models\User ?>
<x-home-layout>

    <div class="w-75 mx-auto d-flex justify-content-center align-items-center mt-5 bg-white rounded">
        <img
            class="w-100 rounded"
            src="storage/blog3.jpg">
    </div>

    <div class="text-center mt-5">
        <h1 class="">Top Posts </h1>
        <div class="container">
            <div class="">

                @foreach($posts as $post)
                    <div class=" d-flex my-5 w-75 mx-auto justify-content-center rounded border">


                        <div class="w-25 ">
                            <h3 class="mb-1"><a class="text-decoration-none text-dark"
                                                href="{{route('showPost', $post->id)}}"> {{$post->title}}</a></h3>
                            <h5 class="mb-1">By {{User::find($post->user_id)->name}}</h5>

                            <div class="container mt-3  text-center">
                                <div class="row">
                                    @foreach($post->tags as $tag)
                                        <div class="mt-1">
                                            <a href="{{route('showTag', $tag->id)}}"
                                               class="text-decoration-none text-dark">
                                                <div class="bg-success rounded-pill">#{{$tag->name}}</div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                        <div class="rounded w-75">
                            <img
                                class="img-fluid  rounded"

                                src="/storage/{{!empty($post->image) ? $post->image : 'noImage.jpg'}}"
                                class="">

                        </div>

                    </div>

                @endforeach

                <!-- Add more child items as needed -->
            </div>
        </div>
    </div>
</x-home-layout>
