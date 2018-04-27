@auth

<a href={{Route('post.create')}}>Create New Post Here</a>
@endAuth
<br>
<table>
    <tr>
        <td>Title</td>
        <td>#</td>
    </tr>
    @foreach($showPost as $sP)
        <tr>
            <td>{{$sP->title}}</td>
            <br>
            <td><a href={{Route('post.show',$sP->id)}}>Read</a></td>
        </tr>
    @endforeach
</table>
{{ $showPost->links() }}
