@extends('adminlte::page')

@section('title', 'Ports')

@section('content_header')
<h1>Ports</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header">

        <form method="GET">

            <div class="row">

                <div class="col-md-5">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Search Port..."
                        value="{{ request('search') }}">

                </div>

                <div class="col-md-5">

                    <select
                        name="country"
                        class="form-control">

                        <option value="">
                            All Countries
                        </option>

                        @foreach($countries as $country)

                        <option
                            value="{{ $country->id }}"
                            @selected(request('country')==$country->id)>

                            {{ $country->name }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-2">

                    <button class="btn btn-primary btn-block">

                        Search

                    </button>

                </div>

            </div>

        </form>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead>

            <tr>

                <th>No</th>
                <th>Port</th>
                <th>Code</th>
                <th>City</th>
                <th>Country</th>
                <th>Type</th>

            </tr>

            </thead>

            <tbody>

            @forelse($ports as $port)

                <tr>

                    <td>
                        {{ ($ports->currentPage()-1) * $ports->perPage() + $loop->iteration }}
                    </td>

                    <td>{{ $port->name }}</td>

                    <td>{{ $port->code }}</td>

                    <td>{{ $port->city }}</td>

                    <td>{{ $port->country->name }}</td>

                    <td>{{ $port->type }}</td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center">
                        No data available.
                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        <div class="mt-3">

            {{ $ports->links() }}

        </div>

    </div>

</div>

@stop