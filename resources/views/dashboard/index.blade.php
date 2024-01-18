@extends('dashboard.layouts.app')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>Welcome Back, {{ auth()->user()->name }}</h4>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">

        <!-- USERS -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="text-decoration-none" data-target="#userBtn" href="javascript:void(0)" data-toggle="modal" title="More Detail">
                <div class="dashboard">
                    <div class="card dashboard shadow h-100 py-1">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                @foreach ($count_users as $k)
                                <div class="col mr-2">
                                    <div class="text-sm text-black mb-0">Pengunjung</div>
                                    <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $k->alldata }} Orang</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-fw fa-user fa-3x" style="color: #2E005D"></i>
                                </div>
                                @endforeach
                            </div>
                            <h6 class="text-xs mt-2 text-truncate text-muted">Last Update: {{ $k->created_at }}</h6>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- TICKET -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="text-decoration-none" data-target="#ticketBtn" href="javascript:void(0)" data-toggle="modal" title="More Detail">
                <div class="dashboard">
                    <div class="card dashboard shadow h-100 py-1">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            @foreach ($count_orders as $k)
                                <div class="col mr-2">
                                    <div class="text-sm text-black mb-0">Pembelian Tiket</div>
                                    <div class="h4 mb-0 font-weight-bold text-gray-800">{{ number_format($k->alldata) }} Orders</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-ticket-alt fa-3x" style="color: #2E005D"></i>
                                </div>
                            </div>
                            
                            <h6 class="text-xs mt-2 text-truncate text-muted">Last Update: {{ $k->created_at }}</h6>
                            @endforeach
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- VENDOR REQUEST -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="text-decoration-none" data-target="#requestBtn" href="javascript:void(0)" data-toggle="modal" title="More Detail">
                <div class="dashboard">
                    <div class="card dashboard shadow h-100 py-1">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            @foreach ($count_request as $k)
                                <div class="col mr-2">
                                    <div class="text-sm text-black mb-0">Vendor Request</div>
                                    <div class="h4 mb-0 font-weight-bold text-gray-800">{{ number_format($k->alldata) }} Request</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-ticket-alt fa-3x" style="color: #2E005D"></i>
                                </div>
                            </div>
                            
                            <h6 class="text-xs mt-2 text-truncate text-muted">Last Update: {{ $k->created_at }}</h6>
                            @endforeach
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- PRODUCT-->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="text-decoration-none" data-target="#produkBtn" href="javascript:void(0)" data-toggle="modal" title="More Detail">
                <div class="dashboard">
                    <div class="card dashboard shadow h-100 py-1">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            @foreach($count_posts as $k)
                                <div class="col mr-2">
                                    <div class="text-sm text-black mb-0">Produk Saya</div>
                                    <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $k->alldata }} Produk</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-fw fa-shopping-bag fa-3x" style="color: #2E005D"></i>
                                </div>
                            </div>
                            <h6 class="text-xs mt-2 text-truncate text-muted">Last Update: {{ $k->created_at }}</h6>
                            @endforeach
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- SCHEDULE ACTIVE-->
        <div class="col-xl-4 col-md-6 mb-4">
            <a class="text-decoration-none" data-target="#eventBerjalanBtn" href="javascript:void(0)" data-toggle="modal" title="More Detail">
                <div class="dashboard">
                    <div class="card dashboard shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                @foreach($count_schedules_active as $k)
                                <div class="col mr-2">
                                    <div class="text-sm text-black mb-0">Event Berjalan</div>
                                    <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $k->alldata }} Event</div>
                                        
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-3x" style="color: #2E005D"></i>
                                </div>
                            </div>
                            <h6 class="text-xs mt-2 text-truncate text-muted">Last Update: {{ $k->created_at }}</h6>
                            @endforeach
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <!-- SCHEDULE SOON-->
        <div class="col-xl-4 col-md-6 mb-4">
            <a class="text-decoration-none" data-target="#eventSegeraBtn" href="javascript:void(0)" data-toggle="modal" title="More Detail">
                <div class="dashboard">
                    <div class="card dashboard shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                @foreach($count_schedules_soon as $k)
                                <div class="col mr-2">
                                    <div class="text-sm text-black mb-0">Event Akan Datang</div>
                                    <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $k->alldata }} Event</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar-day fa-3x" style="color: #2E005D"></i>
                                </div>
                            </div>
                            <h6 class="text-xs mt-2 text-truncate text-muted">Last Update: {{ $k->created_at }}</h6>
                            @endforeach
                        </div>
                    </div>
                </div>
           </a>
        </div>
        
        <!-- SCHEDULE VIP-->
        <div class="col-xl-4 col-md-6 mb-4">
            <a class="text-decoration-none" data-target="#eventVIPBtn" href="javascript:void(0)" data-toggle="modal" title="More Detail">
                <div class="dashboard">
                    <div class="card dashboard shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                @foreach($count_schedules_vip as $k)
                                <div class="col mr-2">
                                    <div class="text-sm text-black mb-0">Event VIP</div>
                                    <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $k->alldata }} Event</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar-plus fa-3x" style="color: #2E005D; transparent:100%"></i>
                                </div>
                            </div>
                            <h6 class="text-xs mt-2 text-truncate text-muted">Last Update: {{ $k->created_at }}</h6>
                            @endforeach
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <!-- MERCHANT AKTIF-->
        <div class="col-xl-6 col-md-6 mb-4">
            <a class="text-decoration-none" data-target="#merchantAktifBtn" href="javascript:void(0)" data-toggle="modal" title="More Detail">
                <div class="dashboard">
                    <div class="card dashboard shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                @foreach($merchant_aktif as $k)
                                <div class="col mr-2">
                                    <div class="text-sm text-black mb-0">Merchant Aktif</div>
                                    <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $k->uname }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-cart-plus fa-3x" style="color: #2E005D"></i>
                                </div>
                            </div>
                            <h6 class="text-xs mt-2 text-truncate text-muted">Total: {{ $k->m_aktif }} Produk</h6>
                            @endforeach
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <!-- MERCHANT PASIF -->
        <div class="col-xl-6 col-md-6 mb-4">
            <a class="text-decoration-none" data-target="#merchantPasifBtn" href="javascript:void(0)" data-toggle="modal" title="More Detail">
                <div class="dashboard">
                    <div class="card dashboard shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                @foreach($merchant_pasif as $k)
                                <div class="col mr-2">
                                    <div class="text-sm text-black mb-0">Merchant Pasif</div>
                                    <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $k->uname }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-cart-arrow-down fa-3x" style="color: #2E005D"></i>
                                </div>
                            </div>
                            <h6 class="text-xs mt-2 text-truncate text-muted">Total: {{ $k->m_pasif }} Produk</h6>
                            @endforeach
                        </div>
                    </div>
                </div>
            </a>
        </div>


    </div>

    <!-- MODAL -->
	<!-- Jumlah User -->
	<div class="modal fade" id="userBtn" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"><i data-feather="calendar" class="align-self-center text-primary icon-md"></i> Detail Pengunjung</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<div class="table-responsive">
						                    
                        @foreach ($count_users as $k)
                        <div class="row">
                            <div class="col-6">
                                <h6 class="text-muted">Show 5 of {{ number_format($k->alldata) }} Data User</h6>
                            </div>
                            <div class="col-6 d-flex justify-content-end mb-2">
                                <a href="/dashboard/users/create" class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">New User</span></a>
                            </div>
                        </div>
                        @endforeach
                        <table id="dataTable-aktivitas-terdekat" class="table card-table display dataTablesCard">
                            <thead class="thead-light font-weight-bold">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                    <th class="text-center" scope="col">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $user)
                                @if($user->role_id != 1)
                                <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $user->name }}</td>
                                  <td>{{ $user->username }}</td>
                                  <td>{{ $user->email }}</td>
                                  <td>********</td>
                
                                  <td class="text-center">
                                    @if($user->role_id == 2)
                                    <div class="badge border-2" style="background-color:cyan"><span class="text">User</span></div>
                                    <!-- <div class="btn btn-success btn-icon-split btn-sm"><span class="text">User</span></div> -->
                                    @elseif($user->role_id == 4)
                                    <div class="badge bg-primary border-2"><span class="text">Vendor</span></div>
                                    <!-- <div class="btn btn-success btn-icon-split btn-sm"><span class="text">Vendor</span></div> -->
                                    @endif
                                  </td>

                                </tr>
                                @endif
                                @endforeach
							</tbody>
                        </table>
                    </div>
				</div>
			</div>
		</div>
	</div>

	<!-- Jumlah Pembelian Tiket -->
	<div class="modal fade" id="ticketBtn" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"><i data-feather="calendar" class="align-self-center text-primary icon-md"></i> Detail Pembelian Tiket</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<div class="table-responsive">
						                    
                        @foreach ($count_orders as $k)
                            <h6 class="text-muted">Show 5 of {{ number_format($k->alldata) }} Data Pembelian Tiket</h6>
                        @endforeach
                        <table class="table card-table display dataTablesCard">
                            <thead class="thead-light font-weight-bold">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pemesan</th>
                                    <th scope="col">Event</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Tanggal Pesan</th>
                                    <th class="text-center" scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order as $k)
                                <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $k->uname }}</td>
                                  <td>{{ $k->event }}</td>
                                  <td>Rp {{ number_format($k->gross_amount, 0, ',', '.') }},-</td>
                                  <td>{{ $k->created_at }}</td>
                                  <td>{{ $k->status }}</td>
                                  
                                </tr>
                                @endforeach
							</tbody>
                        </table>
                    </div>
				</div>
			</div>
		</div>
	</div>
    
	<!-- Jumlah Pembelian Tiket -->
	<div class="modal fade" id="requestBtn" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"><i data-feather="calendar" class="align-self-center text-primary icon-md"></i> Detail Pembelian Tiket</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<div class="table-responsive">
						                    
                        @foreach ($count_request as $k)
                            <h6 class="text-muted">Show 5 of {{ number_format($k->alldata) }} Data Pembelian Tiket</h6>
                        @endforeach
                        <table class="table card-table display dataTablesCard">
                            <thead class="thead-light font-weight-bold">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tgl. Pengajuan</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Marketplace Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($request as $k)
                                <tr>
                                    <td scope="row">{{ $k->id }}</td>
                                    <td>{{ $k->created_at }}</td>
                                    <td>{{ $k->name }}</td>
                                    <td>
                                        <img class="img-responsive" style="height: 100px;" src="{{ asset('storage/' . $k->foto) }}" alt="{{ $k->name }}'s logo">
                                    </td>
                                    <td><a href="{{ $k->marketlink }}" class="btn btn-icon-split" style="width: 30px; height: 30px"><span class="icon text-white-75"><i class='fa fa-link'></i></span></a> {{ $k->marketlink }}</td>
                                  
                                </tr>
                                @endforeach
							</tbody>
                        </table>
                    </div>
				</div>
			</div>
		</div>
	</div>

	<!-- Jumlah Produk Tersedia -->
	<div class="modal fade" id="produkBtn" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"><i data-feather="calendar" class="align-self-center text-primary icon-md"></i> Detail Produk Tersedia</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<div class="table-responsive">
						                    
                        @foreach ($count_posts as $k)
                        <div class="row">
                            <div class="col-6">
                                <h6 class="text-muted">Show 5 of {{ number_format($k->alldata) }} Data Produk Ku Tersedia</h6>
                            </div>
                            <div class="col-6 d-flex justify-content-end mb-2">
                                <a href="/dashboard/posts/create" class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">New Product</span></a>
                            </div>
                        </div>
                        @endforeach
                        <table class="table card-table display dataTablesCard">
                            <thead class="thead-light font-weight-bold">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($my_merchandise as $k)
                                <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $k->title }}</td>
                                  <td>{{ $k->name }}</td>
                                  <td>Rp {{ number_format($k->description, 0, ',', '.') }},-</td>
                                  <td>{!!  \Illuminate\Support\Str::substr($k->body, 0, 495)  !!}...</td>
                                  
                                </tr>
                                @endforeach
							</tbody>
                        </table>
                    </div>
				</div>
			</div>
		</div>
	</div>

	<!-- Jumlah Event Berjalan-->
	<div class="modal fade" id="eventBerjalanBtn" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"><i data-feather="calendar" class="align-self-center text-primary icon-md"></i> Detail Event Berjalan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<div class="table-responsive">
						                    
                        @foreach ($count_schedules_active as $k)
                        <div class="row">
                            <div class="col-6">
                                <h6 class="text-muted">Show 5 of {{ number_format($k->alldata) }} Data Event Berjalan</h6>
                            </div>
                            <div class="col-6 d-flex justify-content-end mb-2">
                                <a href="/dashboard/addSchedule" class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">New Event</span></a>
                            </div>
                        </div>
                        @endforeach
                        <table class="table card-table display dataTablesCard">
                            <thead class="thead-light font-weight-bold">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Event</th>
                                    <th scope="col">Mulai</th>
                                    <th scope="col">Selesai</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($schedules_active as $k)
                                <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $k->name }}</td>
                                  <td>{{ $k->availableScheduleDate }}</td>
                                  <td>{{ $k->dueDateSchedule }}</td>
                                  <td>Rp {{ number_format($k->price, 0, ',', '.') }},-</td>
                                  <td>{{ $k->status }}</td>
                                </tr>
                                @endforeach
							</tbody>
                        </table>
                    </div>
				</div>
			</div>
		</div>
	</div>

	<!-- Jumlah Event Segera-->
	<div class="modal fade" id="eventSegeraBtn" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"><i data-feather="calendar" class="align-self-center text-primary icon-md"></i> Detail Event Akan Datang</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<div class="table-responsive">
						                    
                        @foreach ($count_schedules_soon as $k)
                        <div class="row">
                            <div class="col-6">
                                <h6 class="text-muted">Show 5 of {{ number_format($k->alldata) }} Data Event Akan Datang</h6>
                            </div>
                            <div class="col-6 d-flex justify-content-end mb-2">
                                <a href="/dashboard/addSchedule" class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">New Event</span></a>
                            </div>
                        </div>
                        @endforeach
                        <table class="table card-table display dataTablesCard">
                            <thead class="thead-light font-weight-bold">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Event</th>
                                    <th scope="col">Mulai</th>
                                    <th scope="col">Selesai</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($schedules_soon as $k)
                                <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $k->name }}</td>
                                  <td>{{ $k->availableScheduleDate }}</td>
                                  <td>{{ $k->dueDateSchedule }}</td>
                                  <td>Rp {{ number_format($k->price, 0, ',', '.') }},-</td>
                                  <td>{{ $k->status }}</td>
                                </tr>
                                @endforeach
							</tbody>
                        </table>
                    </div>
				</div>
			</div>
		</div>
	</div>

	<!-- Jumlah Event VIP -->
	<div class="modal fade" id="eventVIPBtn" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"><i data-feather="calendar" class="align-self-center text-primary icon-md"></i> Detail Event VIP</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<div class="table-responsive">
						                    
                        @foreach ($count_schedules_vip as $k)
                        <div class="row">
                            <div class="col-6">
                                <h6 class="text-muted">Show 5 of {{ number_format($k->alldata) }} Data Event VIP</h6>
                            </div>
                            <div class="col-6 d-flex justify-content-end mb-2">
                                <a href="/dashboard/addSchedule" class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">New Event</span></a>
                            </div>
                        </div>
                        @endforeach
                        <table class="table card-table display dataTablesCard">
                            <thead class="thead-light font-weight-bold">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Event</th>
                                    <th scope="col">Mulai</th>
                                    <th scope="col">Selesai</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($schedules_vip as $k)
                                <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $k->name }}</td>
                                  <td>{{ $k->availableScheduleDate }}</td>
                                  <td>{{ $k->dueDateSchedule }}</td>
                                  <td>Rp {{ number_format($k->price, 0, ',', '.') }},-</td>
                                  <td>{{ $k->status }}</td>
                                </tr>
                                @endforeach
							</tbody>
                        </table>
                    </div>
				</div>
			</div>
		</div>
	</div>

	<!-- Merchant Aktif-->
	<div class="modal fade" id="merchantAktifBtn" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"><i data-feather="calendar" class="align-self-center text-primary icon-md"></i> Detail Merchant Aktif</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<div class="table-responsive">
						                    
                        <div class="row">
                            <div class="col-6">
                                <h6 class="text-muted">Show All Data Merchant Aktif</h6>
                            </div>
                            <div class="col-6 d-flex justify-content-end mb-2">
                                <a href="/dashboard/users/create" class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">New Merchant</span></a>
                            </div>
                        </div>
                        <table class="table card-table display dataTablesCard">
                            <thead class="thead-light font-weight-bold">
                                <tr>
                                    <th scope="col">UserID</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Total Produk</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_merchant_aktif as $k)
                                <tr>
                                  <td>{{ $k->user_id }}</td>
                                  <td>{{ $k->name }}</td>
                                  <td>{{ $k->uname }}</td>
                                  <td>{{ $k->role }}</td>
                                  <td>{{ $k->m_aktif }} Produk</td>
                                </tr>
                                @endforeach
							</tbody>
                        </table>
                    </div>
				</div>
			</div>
		</div>
	</div>

	<!-- Merchant Pasif -->
	<div class="modal fade" id="merchantPasifBtn" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"><i data-feather="calendar" class="align-self-center text-primary icon-md"></i> Detail Merchant Pasif</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<div class="table-responsive">
						                    

                        <div class="row">
                            <div class="col-6">
                                <h6 class="text-muted">Show All Data Merchant Aktif</h6>
                            </div>
                            <div class="col-6 d-flex justify-content-end mb-2">
                                <a href="/dashboard/users/create" class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">New Merchant</span></a>
                            </div>
                        </div>
                        <table class="table card-table display dataTablesCard">
                            <thead class="thead-light font-weight-bold">
                                <tr>
                                    <th scope="col">UserID</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Total Produk</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_merchant_pasif as $k)
                                <tr>
                                  <td>{{ $k->user_id }}</td>
                                  <td>{{ $k->name }}</td>
                                  <td>{{ $k->uname }}</td>
                                  <td>{{ $k->role }}</td>
                                  <td>{{ $k->m_aktif }} Produk</td>
                                </tr>
                                @endforeach
							</tbody>
                        </table>
                    </div>
				</div>
			</div>
		</div>
	</div>

    <div class="col-md-12 col-lg-12">
        <div class="row mt-2">

            <div class="col-lg-6">
                <div class="card report-card">
                    <div class="card-header">
                        <figure class="highcharts-figure">
                            <div id="container"></div>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card report-card">
                    <div class="card-header">
                        <figure class="highcharts-figure">
                            <div id="container_chart"></div>
                        </figure>
                    </div>
                </div>
            </div>

        </div>    
    </div>

    <div class="col-md-12 col-lg-12 mt-2">
        <div class="card report-card">
            <div class="card-header">
                <figure class="highcharts-figure">
                    <div id="container_line"></div>
                </figure>
            </div>
        </div> 
    </div>

    <div class="col-md-12 col-lg-12">
        <div class="row mt-2">
            <div class="col-lg-6">
                <div class="card report-card">
                    <div class="card-header">
                        <h5 class="mb-1 font-weight-bold" style="font-size:17px">Jadwal Konser Virtual</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable-notulen-kosong" class="table card-table display dataTablesCard">
                                <thead class="thead-light font-weight-bold">
                                    <tr>
                                        <!-- <th class="text-dark text-center">No.</th> -->
                                        <th class="text-dark text-center">Artist</th>
                                        <th class="text-dark text-center">on Event</th>
                                        <th class="text-dark text-center">Mulai</th>
                                        <th class="text-dark text-center">Selesai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lineup as $k)
                                    <tr>
                                        <td>{{ $k->name }}</td>
                                        <td>{{ $k->sname }}</td>
                                        <td>{{ \Carbon\Carbon::parse($k->availableScheduleDate)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y  H:i') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($k->dueDateSchedule)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y  H:i') }}</td>
                                    <tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card report-card">
                    <div class="card-header">
                        <h5 class="mb-1 font-weight-bold" style="font-size:17px">Merchandise Terbaru</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable-rating-rendah" class="table card-table display dataTablesCard">
                                <thead class="thead-light font-weight-bold">
                                    <tr>
                                        <th class="text-dark text-center">Nama Produk</th>
                                        <th class="text-dark text-center">Kategori</th>
                                        <th class="text-dark text-center">Harga</th>
                                        <th class="text-dark text-center">Upload</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($merchandise as $k)
                                    <tr>
                                        <td>{{ $k->title }}</td>
                                        <td>{{ $k->name }}</td>
                                        <td>{{ number_format($k->description, 0, ',', '.') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($k->created_at)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y  H:i') }}</td>

                                    <tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>

</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    var event = <?= $event ?>;

    Highcharts.chart('container', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Event Paling Ramai'
    },
	credits: {
		enabled: false
	},
    // tooltip: {
    //     valueSuffix: '%'
    // },
    plotOptions: {
        series: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: [{
                enabled: true,
                distance: -5
            }, {
                enabled: true,
                distance: -40,
                format: '{point.percentage:.1f}%',
                style: {
                    fontSize: '0.8em',
                    textOutline: 'none',
                    opacity: 0.7
                },
                filter: {
                    operator: '>',
                    property: 'percentage',
                    value: 10
                }
            }]
        }
    },
    series: [
        {
            name: 'Total Pengunjung',
            colorByPoint: true,
            data: event ,
        }
    ]
});
</script>
<script>
    var aktifitasBulan = <?php echo json_encode($aktifitasBulan)?>;
    var namaBulan = <?php echo json_encode($namabulan)?>;

    Highcharts.chart('container_chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Event Per Bulan'
    },
    credits: {
		enabled: false
	},
    subtitle: {
        align: 'left',
        text: ''
    },
    accessibility: {
        announceNewData: {
        enabled: true
        }
    },
    xAxis: {
            categories: namaBulan
    },
    yAxis: {
        title: {
        text: 'Jumlah'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
        borderWidth: 0,
        dataLabels: {
            enabled: true,
            format: '{point.y:f}'
        }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">Total {point.name}</span>:<b>{point.y:f}</b><br/>'
    },

    series: [
        {
        name: 'Total Event',
        colorByPoint: true,
        data: aktifitasBulan,
            
        }
    ],
    drilldown: {
        breadcrumbs: {
        position: {
            align: 'right'
        }
        },
    }
    });
</script>

<script>

    var series = <?= $data ?>;

    var chartOptions = {
    chart:{zoomType: 'xy'},
    
    title: {
        text: 'Pendapatan per Bulan',
        align: 'left'
    },
    credits: {
        enabled: false
    },
    
    xAxis: {
        categories: <?= $bulan ?>
    },

    yAxis: {
        min: 0,
        title: {
            text: 'Rupiah (Rp)'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
    
    plotOptions: {
        series: {
            allowPointSelect: true
        }
    },

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

};

    
    chartOptions.series = series;

    Highcharts.chart('container_line', chartOptions);

</script>
@endsection