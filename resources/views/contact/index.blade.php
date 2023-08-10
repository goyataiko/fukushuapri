<h1>List of users</h1>

@foreach ($users as $user)
    {{$user->name}}
@endforeach

{{!! $users->links() !!}}