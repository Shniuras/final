@auth
<a href={{Route('user.create')}}>Create New User</a>
@endAuth
<br>
<table>
    <tr>
        <td>Name</td>
        <td>#</td>
    </tr>
    @foreach($showUser as $sU)
        <tr>
            <td>{{$sU->display_name}}</td>
            <br>
            <td><a href={{Route('user.show',$sU->id)}}>Show</a></td>
        </tr>
    @endforeach
</table>
{{ $showUser->links() }}
