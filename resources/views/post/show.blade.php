<p>Title: {{ $postSingle->title }}</p>
<p>Content: {{ $postSingle->content }}</p>
<p>By: <a href="{{route('my',$postUser->id)}}">{{$postUser->display_name}}</a></p>
<p>Date: {{$postSingle->date}}</p>
@auth
@if(Auth::user()->id == $postUser->id)

<a href="{{ route('post.edit',$postSingle->id) }}"><button>Edit</button></a>
<br>
<form action="{{ route('post.destroy', ['id' => $postSingle->id])}}" method="post">
    @csrf
    <div class="form-group">
        <input type="hidden" name="_method" value="delete">
        <button type="submit" class="btn btn-secondary">Delete</button>
    </div>
</form>
@endif
@endAuth
<a href={{Route('post.index')}}><button>Back</button></a>