@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <div class="col">
                <form method="GET" action="{{ route('cities.index') }}">
                    <div class="form-row align-items-center">
                        <div class="col">
                            <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                placeholder="City">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary mb-2">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <a href="{{route('cities.create')}}"><button type="button" class="btn btn-outline-success px-5">Create</button></a>
    </div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class='row'>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">State Name</th>
                    <th scope="col">City Name</th>
                    <th scope="col">Manage</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cities as $city)
                    <tr>
                        <th scope="row">{{$city->id}}</th>
                        <td>{{$city->state->name}}</td>
                        <td>{{$city->name}}</td>
                        <td>
                            <a href="{{route('cities.edit', $city->id)}}"><button type="button" class="btn btn-outline-primary px-5">Edit</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection