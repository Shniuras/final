<form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="text" name="title" placeholder="Enter your Title here">
    <br>
    <textarea name="content" id="" cols="30" rows="10" placeholder="Enter content here"></textarea>
    <br>
    <input type="submit" value="Submit">
</form>