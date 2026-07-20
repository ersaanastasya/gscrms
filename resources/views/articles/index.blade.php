@extends('adminlte::page')

@section('title', 'Articles')

@section('content_header')
<h1>Supply Chain Articles</h1>
@stop

@section('content')

<form method="GET" class="mb-3">

    <div class="input-group">

        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Search article..."
            value="{{ request('search') }}">

        <div class="input-group-append">

            <button class="btn btn-primary">

                Search

            </button>

        </div>

    </div>

</form>

<div class="row">

@forelse($articles as $article)

<div class="col-md-4">

<div class="card">

@if($article->image)

<img
src="{{ asset('storage/'.$article->image) }}"
class="card-img-top"
style="height:220px;object-fit:cover;">

@endif

<div class="card-body">

<h5>

{{ $article->title }}

</h5>

<p>

{{ $article->summary }}

</p>

<small>

{{ $article->author }}

</small>

<br><br>

<a href="{{ route('articles.show', $article->slug) }}"
   class="btn btn-primary">
    Read More
</a>

</div>

</div>

</div>

@empty

<div class="col-12">

<div class="alert alert-info">

No articles found.

</div>

</div>

@endforelse

</div>

<div class="mt-3">

{{ $articles->links() }}

</div>

@stop