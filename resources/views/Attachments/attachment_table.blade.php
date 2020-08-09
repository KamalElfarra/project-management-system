<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">Action</th>
        <th scope="col">Attachment</th>
        <th scope="col">Name</th>


    </tr>
    </thead>
    <tbody>



    <?php $i=1?>
    @foreach($attachments as $att)

        <tr>
            <th scope="row" ><?php echo $i++?></th>
            <td>
                <a class="delete_user" data-toggle="modal" data-target="#delete_user_modal" style="margin-right: 5px" href="/attachment/delete/{{$att->attach_id}}"><i style='font-size:15px' class='fas'>&#xf2ed;</i></a>

            </td>
            <td><a href="/attachment/download/{{$att->attach_id}}" >View</a></td>
            <td>{{$att->attach_Name}}</td>


        </tr>

        @endforeach

    </tbody>
</table>