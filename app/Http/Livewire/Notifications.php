<?php

namespace App\Http\Livewire;

use App\Jobs\DispatchEmails;
use App\Models\Notification;
use App\Models\User;
use App\Notifications\SendNotification;
use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class Notifications extends Component
{
    public $notifications, $users, $user_id, $type, $data, $notification_id, $delid;
    public $updateMode = false;

    public function render()
    {

        $this->notifications = \App\Models\Notification::orderBy('id', 'desc')->get();
        $this->users = User::all();
        return view('livewire.notifications', ['users' => 'users']);
    }


    protected $rules = [
        'user_id' => 'required|integer',
        'type' => 'required|string',
        'data' => 'required|min:6|max:30|string',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $validatedData = $this->validate();

        \App\Models\Notification::create($validatedData);
        $this->resetInput();
        $notification = Notification::latest('id')->first();
        $user_id = $notification->user_id;
        $user = User::find($user_id);
        DispatchEmails::dispatch($user, $notification);
        session()->flash('message', 'Notification Created Successfully.');

    }

    public function resetInput()
    {
        $this->user_id = "";
        $this->data = "";
        $this->type = "";

    }

    public function edit($id)
    {

        $this->notification_id = $id;
        $notification = \App\Models\Notification::find($id);
        $this->user_id = $notification->user_id;
        $this->data = $notification->data;
        $this->type = $notification->type;
        $this->updateMode = true;


    }

    public function update()
    {

        $notification = \App\Models\Notification::find($this->notification_id);
        $validated = $this->validate([
            'user_id' => 'required|integer',
            'type' => 'required|string',
            'data' => 'required|min:6|max:30|string',
        ]);
        $notification->update([
            'user_id' => $this->user_id,
            'data' => $this->data,
            'type' => $this->type,
        ]);
        $user_id = $notification->user_id;
        $user = User::find($user_id);
        DispatchEmails::dispatch($user, $notification);
        $this->resetInput();
        $this->updateMode = false;
        session()->flash('message', 'Notification has been updated Successfully.');

    }

    public function setDelId($id)
    {

        $this->notification_id = $id;
    }

    public function delete()
    {
        $notification = \App\Models\Notification::find($this->notification_id);
        $notification->delete();
        session()->flash('message', 'Notification has been deleted Successfully.');

        $this->notification_id = "";

    }
}
