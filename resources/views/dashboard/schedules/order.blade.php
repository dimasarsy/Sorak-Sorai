@extends('dashboard.layouts.app')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"> <i class="fas fa-ticket-alt"></i> User Orders</h1>
</div>
<div class="card shadow mb-4">
    <div class="col-lg-12">
        <div class="card-body">
            <div class="table-responsive">
                @foreach ($schedules as $schedule)
                <h4 style="color: #650095;font-weight:bold;"><span>{{ $schedule->name }}</span></h4>
                <small class="text-grey"><i class="far fa-calendar" aria-hidden="true"></i> {!! date('d M, Y', strtotime($schedule->date)) !!} &emsp;&emsp; <i class="far fa-clock"></i> {{ $schedule->starttime }}-{{ $schedule->endtime }} WIB</small><br><br>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th class="text-center" scope="col">ID</th>
                            <th class="text-center" scope="col">User Name</th>
                            <th class="text-center" scope="col">Order ID</th>
                            <th class="text-center" scope="col">Order Date</th>

                            <th class="text-center" scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($order as $k)
                            @if($schedule->id === $k->schedule_id)
                        <tr>
                            <td>{{ $k->id }}</td>
                            <td>{{ $k->uname }}</td>
                            <td>{{ $k->order_id }}</td>
                            <td>{{ $k->created_at }}</td>

                            @for ($i = 0; $i < $order_count; $i++) <?php if ($responses[$i]['order_id'] == $k->order_id) { ?>
                                @if($responses[$i]['transaction_status']  == "settlement")
                                <td><div class="badge border-2" style="background-color:green"><span class="text">Success</span></div></td>
                                @elseif($responses[$i]['transaction_status'] == "pending")
                                <td><div class="badge border-2" style="background-color:orange"><span class="text">Pending</span></div></td>
                                @else
                                <td><div class="badge border-2" style="background-color:red"><span class="text">Failed</span></div></td>
                                @endif
                            <?php }  ?>
                            @endfor

                            @endif
                        </tr>
                        
                        @endforeach
                        @empty($schedule->id === $k->schedule_id)
                        <td class="text-center" colspan="5">Belum ada yang membeli tiket</td>
                        @endempty


                    </tbody>
                    <!-- Total Order : {{ $loop->count }} -->
                </table><br>
                @endforeach

                <div class="d-flex justify-content-center">
                    {{ $schedules->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection