
<style>
    .comment_header{
        font-size: 15px;
    }
    .comment_date{
        color: #ccc;
    }
</style>
<div class="card" style="width: 700px" style="padding: 20px;">
    <div class="card-header" >

        <button type="button" class="btn btn-primary {{$closed_comment}}" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Add comment</button>


    </div>
    @foreach($comments as $comment)
    <div class="media ml-2">
        <img class="mr-3  img rounded-circle img-responsive" width="50" height="50"
             src="{{$comment->created_by->image->f_path}}/{{$comment->created_by->image->f_name}}" >
        <div class="media-body">
            <h5 class="mt-1 row">
                <div class="comment_header mr-2 ml-3">{{$comment->created_by->u_firstname}}</div>
                    <div class="comment_date">{{$comment->c_creation_date}}</div>
                    <div class=" btn-group ml-auto mr-4 {{$closed_comment}}">
                        <a class="delete_user btn btn-sm btn-outline-light" title="Delete Comment" href="/comments/delete/{{$comment->c_id}}">
                            <i class="far fa-trash-alt"></i>
                        </a>
                        <a class="btn btn-sm btn-outline-light" title="Edit Comment" href="/comments/edit/{{$comment->c_id}}">
                            <i class="far fa-edit"></i>
                        </a>
                        <a class="open_dialog btn btn-sm btn-outline-light" title="Reply" href="/comments/reply/{{$comment->c_id}}">
                            <i class="fa fa-reply"></i>
                        </a>
                    </div>

            </h5> {{$comment->c_comment}}
            @foreach($comment->replies as $reply)
            <div class="media mt-3">
                <a class="pr-3" href="#">
                    <img class="mr-2 img rounded-circle img-responsive" width="40" height="40"
                         src="{{$reply->user->image->f_path}}/{{$reply->user->image->f_name}}" ></a>
                <div class="media-body">
                    <h5 class="mt-3 row">
                        <div class="comment_header mr-2 ml-3">{{$reply->user->u_firstname}}</div>
                        <div class="comment_date">{{$reply->cr_creation_date}}</div>
                        <div class=" btn-group ml-auto mr-4">
                            <a class="delete_user btn btn-sm btn-outline-light" title="Delete Reply" href="/comments/reply/delete/{{$reply->cr_id}}">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </div>
                    </h5>{{$reply->cr_reply}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
        <hr/>
    @endforeach

</div>



@include("comments.comments_add")