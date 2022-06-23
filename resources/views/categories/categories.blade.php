@extends('layouts.app')

@section('container')
<h1 class="text-3xl font-black text-center md:text-left">Post Categories</h1>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5 py-10">
    @foreach($categories as $categories)
    <div class="rounded-lg w-full shadow-md shadow-slate-200 bg-white">
        <div class="px-7 py-10">
            <h2 class="text-2xl mb-1 font-black block"><a href="/posts?categories={{ $categories->slug }}" class="text-gray-900 hover:text-indigo-600">{{ $categories->name }}</a></h2>
            <?php $totalPosts = $categories->totalPosts(); ?>
            <!-- To prevent double query eager loading -->
            <span class="text-indigo-600 font-bold">{{ $totalPosts }} {{ Str::plural('Post', $totalPosts) }}</span>
        </div>
    </div>
    @endforeach
</div>
@endsection