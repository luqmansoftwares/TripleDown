<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    @livewireStyles
</head>
<body>
<div class="container mt-1">
<div class="card text-center">
    <div class="card-header bg-success text-white">
        Welcome to Admin Panel
        <br>
        <div class="dropdown position-relative ">
            <a class="btn btn-success dropdown-toggle position-absolute bottom-50 end-0 " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{Auth::user()->name}}
            </a>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('profile.edit')}}">Edit Profile</a></li>
                <li><a class="dropdown-item" href="#" onclick="document.getElementById('logout').submit();">LogOut</a>
                    <form id="logout" method="POST" action="{{ route('logout') }}">
                        @csrf

                    </form></li>

            </ul>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-info">

            {{ session('message') }}

        </div>
    @endif
@livewire('notifications')
    <div class="card-footer text-body-secondary">
       Designed & Developed by Luqman
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
@livewireScripts
</body>
</html>
