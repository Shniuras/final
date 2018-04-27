<p>Name: {{ $userSingle->display_name }}</p>
<p>Email: {{ $userSingle->email }}</p>
@auth
@if(Auth::user()->id == $userSingle->id)

<a href="{{ route('user.edit',$userSingle->id) }}"><button>Edit</button></a>
<br>
<form action="{{ route('user.destroy', ['id' => $userSingle->id])}}" method="post">
    @csrf
    <div class="form-group">
        <input type="hidden" name="_method" value="delete">
        <button type="submit" class="btn btn-secondary">Delete</button>
    </div>
</form>
@endif
@endAuth
<a href={{Route('user.index')}}><button>Back</button></a>