<form>
    <div class="form-group mt-4">
        <select class="form-select" wire:model="type" id="type">
            <option value="" selected>Select Notification Type</option>
            <option value="email">Email</option>
            <option value="sms">SMS</option>
        </select>
        @error('type')<span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group mt-4">

        <textarea wire:model="data" class="form-control" id="data"
                  placeholder="Enter Notification details"></textarea>
        @error('data') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group mt-4">
        <select class="form-select" wire:model="user_id" id="user_id">
            <option value="" selected>Select User</option>
            @foreach($users as $user)
                <option value="{{$user->id}}" selected>{{$user->name}}</option>
            @endforeach

        </select>
        @error('user_id')<span class="text-danger">{{$message}}</span> @enderror
    </div>

    @if($updateMode)

        <button wire:click.prevent="update()" class="btn btn-success mt-4 mb-4 float-end">
            Update
            Notification
        </button>
    @else
        <button wire:click.prevent="store()" class="btn btn-success mt-4 mb-4 float-end mb-2">
            Create
            Notification
        </button>
    @endif
    <hr>
</form>
