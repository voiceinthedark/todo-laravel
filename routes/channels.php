<?php

use App\Models\Todo;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('todo.{todoId}', function (User $user, int $todoId) {
    return (int) $user->id === Todo::find($todoId)->user_id;
    // return true;
});
