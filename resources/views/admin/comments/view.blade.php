


{{($comment->body)}}
<form action="/admin/comments/remove/{{$comment->id}}" method="post">
    @method('DELETE')
    @csrf
    <input type="submit" name="delete" id="deletecombtn" class="btn" value="Delete">
</form>
@if ($comment->approved == 0)
    <form action="/admin/comments/aprove/{{$comment->id}}" method="post">
        @method('PATCH')
        @csrf
        <input type="submit" name="aprove" id="appcombtn" class="btn" value="Aprrove comment">
    </form>
@else
    <form action="/admin/comments/unaprove/{{$comment->id}}" method="post">
        @method('PATCH')
        @csrf
        <input type="submit" name="unaprove" id="appcombtn" class="btn" value="Dissaprrove comment">
    </form>
@endif






