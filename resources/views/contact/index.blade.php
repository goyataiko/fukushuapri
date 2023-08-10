<h1>List of users</h1>

@if(count($users)>0)
    @foreach ($users as $user)
    <p>Name: {{$user->name}} | Gender: {{$user->gender}}</p>
    @endforeach
    {{!! $users->links() !!}}
@else
<p>No Record</p>    
@endif

<form action="{{route('contact.store')}}" method="POST">@csrf
    <input type="text" name="name" placeholder="input the name"><br>
        <select name="gender">
            <option value=" ">Slect Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    <button type="submit">submit</button>
</form>