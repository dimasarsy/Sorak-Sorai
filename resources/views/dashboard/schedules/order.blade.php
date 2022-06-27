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
                <small class="text-grey"><i class="far fa-calendar" aria-hidden="true"></i> {{ $schedule->date }} &emsp;&emsp; <i class="far fa-clock"></i> {{ $schedule->starttime }}-{{ $schedule->endtime }} WIB</small><br><br>

                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Order ID</th>
                            <th scope="col">Order Date</th>

                            <th scope="col">Status</th>
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

                            @for ($i = 0; $i < $order_count; $i++) <?php if ($responses[$i]['order_id'] == $k->order_id) { ?> <td class="text-center">{{ $responses[$i]['transaction_status'] }}</td>
                            <?php }  ?>
                            @endfor

                            @endif
                            @empty($schedule->id === $k->schedule_id)
                            <td class="text-center" colspan="5">Belum ada yang membeli tiket</td>
                            @endempty
                        </tr>

                        @endforeach


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