@extends(auth()->check() && auth()->user()->isAdmin() ? 'layout.admin' : 'layout.layout')@section('title', $pageTitle)

@php
    $genre = json_decode($game[0]['genre'], true);
    $patterns = [
            '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/',
            '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/'
    ];
    $vidLink = ''; 
    foreach ($patterns as $pattern) {
        if (preg_match($pattern, $game[0]['link'], $matches)) {
            $vidLink = $matches[1];
            break;
        }
    }

    if (empty($vidLink)) {
        $vidLink = '';
    }
@endphp

@section('content')
<div class="min-h-screen bg-gray-100 p-8">
    <div class="md:w-10/12 m-auto  flex flex-col items-center">
        <h5 class="text-2xl md:text-3xl font-medium my-3">{{$game[0]['judul']}}</h5>
        <div class="max-w-full md:max-w-xl">
            @if(!empty($game[0]['image']))
            <div class="rounded-xl overflow-hidden">
                <img src="{{ asset('storage/img/' . $game[0]['image']) }}">
            </div>
            @endif
            <p class="text-slate-500 text-lg mt-3 place-self-start">{{ $genre['genre'] }}</p>
        </div>
        @if(empty($g['deskripsi']))
        <p class="text-slate-500 text-lg mt-3">Tidak ada deskripsi.</p>
        @else
        <p class="text-slate-500 text-lg mt-3 truncate">{{$g['deskripsi']}}</p>
        @endif
        @if(!empty($vidLink))
        <iframe src="https://www.youtube.com/embed/{{$vidLink}}" title="YouTube video player" class="w-full aspect-video lg:w-4/6 mt-5" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        @endif
    </div>
</div>
@endsection