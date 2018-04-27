<table>
    <tr>
        <td>Title</td>
        <td>Content</td>
    </tr>
    @foreach($posts as $post)
        <tr>
            <td>{{$post->title}}</td>
            <td>{{$post->content}}</td>
        </tr>
    @endforeach
</table>
<a href={{Route('post.index')}}><button>Back</button></a>