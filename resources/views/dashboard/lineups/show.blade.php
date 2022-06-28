@extends('dashboard.layouts.app')

@section('container')
<div class="card shadow mb-4">
    <div class="container">
        <div class="mt-5">
            <a href="/dashboard/lineups" class="btn btn-success"><span data-feather="arrow-left"></span><i class="fas fa-arrow-left"></i></a>
            <a href="/dashboard/lineups/{{ $lineup->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            <form action="/dashboard/lineups/{{ $lineup->slug }}" method="post" class="d-inline">
                @method('DELETE')
                @csrf
                <button onclick="return confirm('Are you sure to delete this post?')" class="btn btn-danger"><span data-feather="x-circle"></span> Delete</button>
            </form>
        </div>
        <div class="row">
            <div class="col-5">
                <div class="show-image mt-2">
                    <img src="{{ asset('storage/' . $lineup->image) }}" alt="{{ $lineup->title }} 's image">
                </div>
            </div>

            <div class="col-7">                
                <div class="mt-5">
                    <h5 class="name-show">{{ $lineup->name }}</h5>
                    <div class="row">
                        <div class="col-6">
                            <h5 class="date-time-show"><i class="fa fa-calendar" aria-hidden="true"></i> {{ $lineup->date }}</h5>
                        </div>
                        <div class="col-6">
                            <h5 class="date-time-show"><i class="far fa-clock"></i> {{ $lineup->starttime }} - {{ $lineup->endtime }}</h5>
                        </div>
                    </div>
                
                    <div class="my-20"></div>
                    <div class="info-show">
                        {!! $lineup->information !!}
                    </div>
                </div>
            </div>
            
        </div>
    </div>

</div>
@endsection
