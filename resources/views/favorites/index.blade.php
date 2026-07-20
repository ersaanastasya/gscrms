@extends('adminlte::page')

@section('title', 'Favorites')

@section('content_header')
    <h1>Favorite Countries</h1>
@stop

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card">

    <div class="card-header">

        <h3 class="card-title">
            Favorite Countries
        </h3>

    </div>

    <div class="card-body">

        @if($favorites->count())

        <table class="table table-bordered table-hover">

            <thead>

                <tr>

                    <th width="60">No</th>
                    <th>Country</th>
                    <th>Capital</th>
                    <th>Region</th>
                    <th width="120">Action</th>

                </tr>

            </thead>

            <tbody>

            @foreach($favorites as $favorite)

                <tr>

                    <td>
                        {{ ($favorites->currentPage()-1) * $favorites->perPage() + $loop->iteration }}
                    </td>

                   <td>{{ optional($favorite->country)->name ?? '-' }}</td>

                    <td>{{ optional($favorite->country)->capital ?? '-' }}</td>

                    <td>{{ optional($favorite->country)->region ?? '-' }}</td>

                    <td>

                        <form
                            action="{{ route('favorites.destroy',$favorite->id) }}"
                            method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Remove this country from favorites?')">

                                <i class="fas fa-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

        <div class="mt-3">

            {{ $favorites->links() }}

        </div>

        @else

        <div class="alert alert-info">

            No favorite countries yet.

        </div>

        @endif

    </div>

</div>

@stop