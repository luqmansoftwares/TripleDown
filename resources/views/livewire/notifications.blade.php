<div>
    <div class="alert alert-success">
        @if (session()->has('message'))
            <div class="alert alert-info">

                {{ session('message') }}

            </div>
        @endif
    </div>
    <div class="card-body">


        @include('livewire.create')

            @include('livewire.delete')

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Notified User</th>
                <th scope="col">Notification Content</th>
                <th scope="col">Notification Type </th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach($notifications as $notification)
            <tr>
                <th scope="row">{{$notification->user->name}}</th>
                <th scope="row">{{$notification->data}}</th>
                <td>{{$notification->type}}</td>
                <td><button wire:click="edit({{$notification->id}})" class="btn btn-info">Edit</button></td>
                <td>
                    <button type="button"  wire:click="setDelId({{ $notification->id }})"   class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</div>
