@extends('dashboard.layouts.app')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"> <i class="fas fa-ticket-alt"></i> User Orders</h1>
</div>
<div class="card shadow mb-4">
    <div class="col-lg-12">
        <div class="card-body">
            <div class="table-responsive">
                @foreach ($schedule as $schedule)
                    <h5 style="color: #650095;font-weight:bold;">{{ $loop->iteration }}) <span>{{ $schedule->name }}</span></h5>
                   
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                @if($schedule->id ===  $k->schedule_id)
                                <tr>
                                    <td>{{ $k->id }}</td>
                                    <td>{{ $k->uname }}</td>
                                    <td>{{ $k->order_id }}</td>
                                    <td>{{ $k->created_at }}</td>

                                    @for ($i = 0; $i < $order_count; $i++) <?php if ($responses[$i]['order_id'] == $k->order_id) { ?> <td class="text-center">{{ $responses[$i]['transaction_status'] }}</td>
                                    <?php }  ?>
                                    @endfor

                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                        <!-- Total Order : {{ $loop->count }} -->
                    </table><br>
                @endforeach

            </div>
        </div>
    </div>
</div>

@endsection