<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-equzoUybFDg0QXTm"></script>
    @yield('style')
    <title>{{ $title }}</title>

    <style>
        .badge.badge-danger {
            background-color: red;
            border-radius: 50%;
        }

    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Manasik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    @auth
                        @if (Auth::user()->role->name == 'User')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ auth()->User()->username }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item {{ $active == 'viewUpcomingSchedule' ? 'active' : '' }}"
                                            href="/viewUpcomingSchedule">Upcoming Schedules</a></li>
                                    <li><a class="dropdown-item {{ $active == 'historyTransaction' ? 'active' : '' }}"
                                            href="/historyTransaction">Transaction History</a></li>
                                    <li><a class="dropdown-item {{ $active == 'change_password' ? 'active' : '' }}"
                                            href="/change_password">Change Password</a></li>
                                    <li>
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-bell px-2"></i>
                                    Notification
                                    @if (auth()->user()->unreadNotifications->count())
                                        <span
                                            class="badge badge-danger">{{ count(auth()->user()->unreadNotifications) }}</span>
                                    @endif
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li class="text-end px-2"><a href="{{ route('markRead') }}"
                                            class="text-decoration-none fw-bold" style="color: green; font-size: 12px;">Mark
                                            all as Read</a></li>

                                    @foreach (auth()->user()->unreadNotifications as $notification)
                                        <li class="list-group-item" style="background-color: lightgray">
                                            <a href="/scheduleDetail/{{ $notification->data['schedule']['id'] }}"
                                                class="text-decoration-none" style="color: black">
                                                {{ $notification->data['user']['name'] }}, your
                                                <strong>{{ $notification->data['schedule']['name'] }} schedule</strong>
                                                will start in <span style="color: red" class="fw-bold">one
                                                    hour</span>
                                            </a>
                                        </li>
                                    @endforeach

                                    @foreach (auth()->user()->readNotifications as $notification)
                                        <li class="list-group-item">
                                            <a href="/scheduleDetail/{{ $notification->data['schedule']['id'] }}"
                                                class="text-decoration-none" style="color: black">
                                                {{ $notification->data['user']['name'] }}, your
                                                <strong>{{ $notification->data['schedule']['name'] }} schedule</strong>
                                                will start in <span style="color: red" class="fw-bold">one
                                                    hour</span>
                                            </a>
                                        </li>
                                    @endforeach

                                    @if (auth()->user()->unreadNotifications->count() == 0 &&
                                        auth()->user()->readNotifications->count() == 0)
                                        <li class="list-group-item"><a href="#" class="text-decoration-none"
                                                style="color: black;">No Notifications</a></li>
                                    @endif

                                    <li class="text-start px-2"><a href="/deleteAllNotification/{{ auth()->user()->id }}"
                                            class="text-decoration-none fw-bold" style="color: red; font-size: 12px;">Delete
                                            All</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ auth()->User()->username }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item {{ $active == 'addSchedule' ? 'active' : '' }}"
                                            href="{{ url('addSchedule') }}">Add Schedule</a></li>
                                    <li><a class="dropdown-item {{ $active == 'viewUpcomingSchedule' ? 'active' : '' }}"
                                            href="/viewUpcomingSchedule">Upcoming Schedules</a></li>
                                    <li><a class="dropdown-item {{ $active == 'scheduleHistory' ? 'active' : '' }}"
                                            href="/scheduleHistory">Schedule History</a></li>
                                    <li><a class="dropdown-item {{ $active == 'orders' ? 'active' : '' }}"
                                            href="{{ url('/orders') }}">Orders Table</a></li>
                                    <li><a class="dropdown-item {{ $active == 'change_password' ? 'active' : '' }}"
                                            href="/change_password">Change Password</a></li>
                                    <li>
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    @else
                        <a class="nav-link {{ $active == 'schedule' ? 'active' : '' }}" aria-current="page"
                            href="{{ url('login') }}"></a>
                        <a class="nav-link {{ $active == 'login' ? 'active' : '' }}" aria-current="page"
                            href="{{ url('login') }}">Login</a>
                        <a class="nav-link {{ $active == 'register' ? 'active' : '' }}"
                            href="{{ url('register') }}">Register</a>
                    @endauth
                    {{-- <a class="nav-link" style="cursor: pointer"> {{ date('D, d-M-Y') }} </a> --}}
                    <a class="nav-link" style="cursor: pointer">
                        {{ Carbon\Carbon::parse()->format('D, d-M-Y H:i:s') }} </a>
                </div>
            </div>
        </div>
    </nav>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        function back() {
            window.history.back();
        }
    </script>



    @yield('content')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
