@extends('dashboard.layouts.app')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"> <i class="fas fa-ticket-alt"></i> Schedule History</h1>
</div>

@include('dashboard.layouts.popup')

<div class="card shadow mb-4">
    <div class="col-lg-12">
        <div class="card-body">
            <div class="container">

                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">Schedule Image</th>
                                <th class="text-center" scope="col">Schedule Name</th>
                                <th class="text-center" scope="col">Schedule Price</th>
                                <th class="text-center" scope="col">Schedule Date</th>
                                <th class="text-center" scope="col">Start Time</th>
                                <th class="text-center" scope="col">End Time</th>
                                <th class="text-center" scope="col">Status</th>
                                <th class="text-center" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                            <tr style="vertical-align: middle ">
                                <td class="py-5" id="schedule">
                                    @if($schedule->vip == 1)
                                    <div class="position-absolute px-3 py-2 text-dark font-weight-bold" style="background:#ffd700;">VIP</div>
                                    @endif
                                    <img src="{{ asset('storage/' . $schedule->image) }}" width="150px">
                                </td>
                                <td>{{ $schedule->name }}</td>
                                <td>Rp {{ number_format($schedule->price, 0, ',', '.') }}</td>
                                <td>{{ $schedule->date }}</td>
                                <td>{{ $schedule->starttime }}</td>
                                <td>{{ $schedule->endtime}}</td>

                                @if($schedule->status == 'available')
                                <td class="fw-bold text-success px-5">{{ $schedule->status}}</td>
                                @else
                                <td class="fw-bold text-danger px-5">{{ $schedule->status}}</td>
                                @endif

                                <td class="text-center">
                                    <!-- <a href="/dashboard/updateSchedule/{{ $schedule->id }}" class=""><span data-feather="edit"></span></a> -->

                                    <!-- <form action="/dashboard/delete/{{ $schedule->id }}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure want to delete this schedule?')" type="submit" name="delete"><span data-feather="x-circle"></span></button>
                                </form> -->

                                    @if($schedule->status == "available")
                                    <a href="/dashboard/updateSchedule/{{ $schedule->id }}" class="btn btn-info btn-circle btn-sm" data-tip="Edit"><i class="fas fa-edit"></i></a>
                                    @endif

                                    <form action="/dashboard/delete/{{ $schedule->id }}" method="post" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are you sure to delete this user?')"><i class="fas fa-trash"></i></button>
                                    </form>

                                </td>
                                @endforeach
                        </tbody>
                    </table>
                    {{-- <div class="text-end fw-bold"> Total Price:
                ${{ $total }}
                </div> --}}
            </div>
        </div>
    </div>
</div>


@endsection