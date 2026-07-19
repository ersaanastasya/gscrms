@extends('adminlte::page')

@section('title', 'Countries')

@section('content_header')
<h1>Countries</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header">

        <h3 class="card-title">
            List of Countries
        </h3>

    </div>

    <div class="card-body table-responsive">
        <form method="GET">

<div class="row mb-3">

    <div class="col-md-5">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            class="form-control"
            placeholder="Search Country...">
    </div>

    <div class="col-md-4">

        <select
            name="region"
            class="form-control">

            <option value="">All Region</option>

            @foreach($regions as $region)

                <option
                    value="{{ $region }}"
                    @selected(request('region')==$region)>

                    {{ $region }}

                </option>

            @endforeach

        </select>

    </div>

    <div class="col-md-3">

        <button class="btn btn-primary">
            Search
        </button>

        <a href="{{ route('countries.index') }}"
           class="btn btn-secondary">

            Reset

        </a>

    </div>

</div>

</form>
    <div class="mb-3">

<strong>Total Countries :</strong>

{{ $countries->total() }}

</div>

        <table class="table table-bordered table-hover">

            <thead>

            <tr>

                <th>No</th>
                <th>Flag</th>
                <th>Code</th>
                <th>Country</th>
                <th>Capital</th>
                <th>Region</th>
                <th>Currency</th>
                <th>Action</th>

            </tr>

            </thead>

            <tbody>

            @forelse($countries as $country)

            <tr>

                <td>{{ $loop->iteration + ($countries->currentPage()-1)*$countries->perPage() }}</td>

                <td width="80">

                    <img src="{{ $country->flag }}"
                         width="40">

                </td>

                <td>{{ $country->code }}</td>

                <td>{{ $country->name }}</td>

                <td>{{ $country->capital }}</td>

                <td>{{ $country->region }}</td>

                <td>{{ $country->currency }}</td>

                <td>

    <a href="{{ route('countries.show', $country->id) }}"
   class="btn btn-info btn-sm">

    Detail

</a>

</td>

            </tr>

            @empty

            <tr>

                <td colspan="8" class="text-center">

                    No Data

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="card-footer">

        {{ $countries->links() }}

    </div>

</div>

@stop