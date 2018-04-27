
    <form action="{{route('post.update',['id' => $edit->id])}}" method="post">
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="text" name="title" class="form-control" placeholder="Edit your title" value="{{$edit->title}}">
        <br>
            <textarea name="content" placeholder="Edit your content">{{$edit->content}}</textarea>
        <br>
        <button type="submit">Update</button>
        <a href={{Route('post.show',$edit->id)}}>Back</a>
    </form>