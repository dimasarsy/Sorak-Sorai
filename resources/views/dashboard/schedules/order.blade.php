

@extends('dashboard.layouts.app')

@section('container')
<h1 class="font-black text-right mt-5 mb-5">User Orders</h1>
    
<section id="performance" class="performance mt-5">
  <div class="container" data-aos="fade-up">

    <div class="row my-3">
            
            <div class="row">
                {{-- <form action="/scheduleHistory" method="GET" class="m-5 mb-0 p-2">
                <div class="row mt-3">
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search..." name="search"
                                value="{{request('search')}}">
                        </div>
                    </div>
                    <div class="col-1 px-0">
                        <select class="form-select col-2" id="filter" name="filter">
                            @foreach ($filters as $f)
                            @if (request('filter') == $f->id)
                            <option selected value="{{ $f->id }}">
                                {{ $f->name }}
                            </option>
                            @else
                            <option value="{{ $f->id }}">
                                {{ $f->name }}
                            </option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <button class="btn text-black btn-outline-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form> --}}
                {{-- <form action="/scheduleHistory" method="GET" class="m-5 mt-4 p-2">
                <div class="row">
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="date" class="form-control" placeholder="Search By Schedule Date..." name="searchDate"
                                id="searchDate" value="{{request('searchDate')}}">
                        </div>
                        <div class="col mt-2">
                            <button class="btn text-black btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </form> --}}
            </div>

            
            <div class="row my-5 justify-content-center text-center">
                <div class="col-md-8 ">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Order ID</th>
                                <th scope="col">Action</th>
                                <th scope="col">Access</th>
                                {{-- <th scope="col">Schedule Price</th>
                            <th scope="col">Schedule Date</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">End Time</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $k)
                                <tr style="vertical-align: middle ">
                                    <td>{{ $k->id }}</td>
                                    <td>{{ $k->order_id }}</td>
                                    {{-- @foreach ($responses[0] as $r) --}}
                                    {{-- <td><a class="btn btn-primary">Detail</a></td> --}}

                                    {{-- JANGAN DIHAPUS --}}
                                    {{-- JANGAN DIHAPUS --}}
                                    {{-- JANGAN DIHAPUS --}}

                                    @for ($i = 0; $i < $order_count; $i++)
                                        <?php if($responses[$i]['order_id'] == $k->order_id){ ?>
                                        <td class="text-center">
                                            {{ $responses[$i]['transaction_status'] }}
                                        </td>
                                        <?php if ($responses[$i]['transaction_status'] == 'settlement'){ ?>
                                        <td><a href="#" class="btn btn-primary">Link Access Sorak-sorai</a></td>
                                        <?php } else { ?>
                                        <td>User belum melakukan transaksi</td>
                                        <?php } } ?>
                                    @endfor

                                    {{-- JANGAN DIHAPUS --}}
                                    {{-- JANGAN DIHAPUS --}}
                                    {{-- JANGAN DIHAPUS --}}
                                    {{-- @endforeach --}}
                                </tr>

                            @endforeach

                            {{-- @foreach ($responses as $r)
                                <td>
                                    {{ $r->transaction_status }}
                                </td>
                            @endforeach --}}

                        </tbody>

                        {{-- <tbody>
                        @foreach ($schedules as $schedule)
                        <tr style="vertical-align: middle ">
                            <td class="py-5">
                                <img src="{{ Storage::url("/image"."/".$schedule->image) }}" width="80%">
                            </td>
                            <td>{{ $schedule->name }}</td>
                            <td>{{ $schedule->price}}</td>
                            <td>{{ $schedule->date }}</td>
                            <td>{{ $schedule->starttime }}</td>
                            <td>{{ $schedule->endtime}}</td>
                            <td class="fw-bold text-success px-5">Finished</td>
                        </tr>
                        @endforeach
                        </tbody> --}}

                    </table>

                    {{-- <div class="text-end fw-bold"> Total Price:
                    ${{ $total }}
                    </div> --}}

                </div>
                
            </div>
            
        </div>
    </div>

    {{-- @include('layout.script-midtrans') --}}

@endsection

