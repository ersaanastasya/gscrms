@extends('adminlte::page')

@section('title',$article->title)

@section('content')

<div class="card">

<div class="card-header">

<h3>

{{ $article->title }}

</h3>

</div>

<div class="card-body">

@if($article->image)

<img
src="{{ asset('storage/'.$article->image) }}"
class="img-fluid mb-4">

@endif

<p>

<strong>Author:</strong>

{{ $article->author ?? '-' }}

</p>

<p>

<strong>Published:</strong>

{{ optional($article->published_at)->format('d M Y H:i') ?? '-' }}

</p>

<hr>

{!! nl2br(e($article->content)) !!}

</div>

</div>

@stop