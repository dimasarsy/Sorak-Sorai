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
                                <th class="text-center" scope="col">Time(WIB)</th>
                                <th class="text-center" scope="col">Status</th>
                                <th class="text-center" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                            <tr style="vertical-align: middle ">
                                <td class="text-center py-5" id="schedule">
                                    @if($schedule->vip == 1)
                                    <div class="position-absolute px-2 py-1 text-dark font-weight-bold" style="background:#ffd700;">VIP</div>
                                    @endif
                                    <img src="{{ asset('storage/' . $schedule->image) }}" width="150px">
                                </td>
                                <td class="text-center">{{ $schedule->name }}</td>
                                <td class="text-center">Rp.{{ number_format($schedule->price, 0, ',', '.') }},-</td>
                                <td class="text-center">{!! date('d M, Y', strtotime($schedule->date)) !!}</td>
                                <td class="text-center">{{ $schedule->starttime }} - {{ $schedule->endtime}}</td>

                                @if($schedule->status == 'available')
                                <td class="text-center">
                                    <div class="badge border-2" style="background-color:green"><span class="text-md">{{ $schedule->status}}</span></div>
                                </td>
                                @elseif($schedule->status == 'deleted')
                                <td class="text-center">
                                    <div class="badge border-2" style="background-color:red"><span class="text-md">{{ $schedule->status}}</span></div>
                                </td>
                                @else
                                <td class="text-center">
                                    <div class="badge border-2" style="background-color:orange"><span class="text-md">{{ $schedule->status}}</span></div>
                                </td>
                                @endif

                                <!-- <form action="{{ url('dashboard/pengajuan-vendor/update', $schedule->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <td colspan="2">
                                        <div class="col-auto my-1">
                                            @if($schedule->status == 'available')
                                            <select name="status" style="background-color:green; color:white" class="custom-select mr-sm-2" autocomplete="status" id="inlineFormCustomSelect">
                                                <option style="background-color:white; color:black"  value="{{ old('status', $schedule->status) }}">available</option>
                                                <option style="background-color:white; color:black"  value="soon">soon</option>
                                            </select>
                                            @elseif($schedule->status == 'soon')
                                            <select name="status" style="background-color:orange; color:white" class="custom-select mr-sm-2" autocomplete="status" id="inlineFormCustomSelect">
                                                <option style="background-color:white; color:black"  value="{{ old('status', $schedule->status) }}">soon</option>
                                                <option style="background-color:white; color:black"  value="soon">available</option>
                                            </select>
                                            @endif
                                        </div><br>

                                        <button type="submit" class="btn btn-primary px-2 py-2 mx-5">Ubah</button></td>
                                    </td>

                                </form> -->

                                <td class="text-center">

                                    @if($schedule->status == "available")
                                    <a href="/dashboard/updateSchedule/{{ $schedule->id }}" class="btn btn-info btn-circle btn-sm" data-tip="Edit"><i class="fas fa-edit"></i></a>
                                    @endif

                                    @if($schedule->status == "soon")
                                    <a href="/dashboard/updateSchedule/{{ $schedule->id }}" class="btn btn-info btn-circle btn-sm" data-tip="Edit"><i class="fas fa-edit"></i></a>
                                    @endif

                                    @if($schedule->status != "deleted")
                                    <form action="/dashboard/delete/{{ $schedule->id }}" method="post" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are you sure to delete this Schedule?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                    @endif

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