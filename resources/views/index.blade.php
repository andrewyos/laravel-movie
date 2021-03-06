@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-lg font-semibold" style="color: sandybrown">Popular Movies</h2>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
                @foreach ($popularMovies as $p)
                <div class="mt-8">
                    <a href="{{ route('movies.show', $p['id']) }}">
                        <img src="{{'https://image.tmdb.org/t/p/w500/'.$p['poster_path']}}" alt="parasite" class="hover:opacity-70 transitition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="{{ route('movies.show', $p['id'])}}" class="text-lg mt-2 hover:text-gray-300">{{$p['title']}}</a>
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <span><svg class="fill-current w-4" style="color: orange" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg></span>
                            <span class="ml-1">{{$p['vote_average'] * 10 .'%'}}</span>
                            <span class="mx-2"> |</span>
                            <span>{{\Carbon\Carbon::parse($p['release_date'])->format('M d, Y')}}</span>
                        </div>
                        <div class="text-gray-400 text-sm">
                            @foreach ($p['genre_ids'] as $g)
                            <span class="width-350">{{$genres->get($g)}}@if (!$loop->last),@endif
                            </span>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- END OF POPULAR MOVIES -->

            <div class="now-playing-movies py-24">
            <h2 class="uppercase tracking-wider text-lg font-semibold" style="color: sandybrown">Now Playing</h2>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
                @foreach ($nowPlaying as $np)
                <div class="mt-8">
                    <a href="#">
                        <img src="{{'https://image.tmdb.org/t/p/w500/'.$np['poster_path']}}" alt="joker" class="hover:opacity-70 transitition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray-300">{{$np['title']}}</a>
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <span><svg class="fill-current w-4" style="color: orange" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg></span>
                            <span class="ml-1">{{$np['vote_average'] * 10 .'%'}}</span>
                            <span class="mx-2"> |</span>
                            <span>{{\Carbon\Carbon::parse($np['release_date'])->format('M d, Y')}}</span>
                        </div>
                        <div class="text-gray-400 text-sm">
                            @foreach ($np['genre_ids'] as $g)
                            <span class="width-350">{{$genres->get($g)}}@if (!$loop->last),@endif
                            </span>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
@endsection
