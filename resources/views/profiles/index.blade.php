@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
             <img src=" {{ $user->profile->profileImage() }} " class="w-75 rounded-circle" alt=""> 
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-content-center pb-3">
                    <div class="h1"> {{ $user->username }}</div>

                            <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}" v-show="{{ $user->id !== $profile->id }}"></follow-button>

                </div>
                @can('update', $user->profile)
                    <a href="/p/create">Add New Post</a>
                @endcan
            </div>

            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan

            
            <div class="d-flex">
                <div class="pr-5"> <strong> {{ $postCount }} </strong> Posts</div>
                <div class="pr-5"> <strong>{{ $followersCount }}</strong> Followers</div>
                <div class="pr-5"> <strong> {{ $followingCount }}</strong> Followings</div>
            </div>
            <div class="pt-4 font-weight-bold">
                 {{ $user->profile->title }} 
            </div>
             <div> {{ $user->profile->description}}</div> 
             <div><a href="#"> {{ $user->profile->url ?? 'N/A'}}</a></div> 
        </div>
    </div>

     <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
        {{-- <div class="row pt-2 pb-4">
            <div class="col-6 offset-3">
                <div>
                    <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{ $post->user->id }}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                    </span> {{ $post->caption }}
                    </p>
                </div>
            </div>
        </div> --}}
    @endforeach
    </div> 
</div>
@endsection
