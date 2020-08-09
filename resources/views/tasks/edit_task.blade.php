@extends('panel.control')
@section('conection')

<div class="card">

    <div class="card-header">


    </div>

    <div class="card-body">
        <form method="post" enctype="multipart/form-data">

            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

            <div class="modal-body">
                <div class="form-group row">
                    <label for="priority" class="col-3">type:</label>
                    <select name="type" class="col-8" id="priority">

                        @foreach($type as $ty)

                        <option value="{{$ty->cd_id}}">{{$ty->cd_name}}</option>

                        @endforeach

                    </select>
                </div>

                <div class="form-group row">
                    <label for="recipient-name" class="col-3">Name:</label>
                    <input value="{{$task->ta_name}}" name="Name" type="text" class="col-8" id="recipient-name" placeholder="Enter your name">
                </div>

                <div class="form-group row">
                    <label for="message-text" class="col-3">status:</label>
                    <select name="status" class="col-8" id="status">
                        @foreach($status as $st)
                        <option value="{{$st->cd_id}}">{{$st->cd_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group row">
                    <label for="priority" class="col-3">priority:</label>
                    <select name="priority" class="col-8" id="priority">
                        @foreach($priority as $pr)
                        <option value="{{$pr->cd_id}}">{{$pr->cd_name}}</option>
                        @endforeach
                    </select>
                </div>


                <div  class="form-group row">
                    <label for="assign_to" class="col-3">Assigned To:</label>
                    <select name="assign_to" class="col-8" id="assign_to">
                        @foreach($task_users as $u)
                        <option value="{{$u->user->u_id}}">{{$u->user->u_firstname}}</option>
                        @endforeach
                    </select>
                </div>




                <div class="form-group row">
                    <label for="comment" class="col-3">Description:</label>
                    <textarea name="description" class="col-8" id="comment"></textarea>
                </div>
                <hr>

                <div class="form-group row">
                    <label for="date_picker" class="col-3">start Date:</label>
                    <input  name="start_date" type="date" class="form-control datetimepicker-input col-8"
                            id="datetimepicker5" data-toggle="datetimepicker" data-target="#datetimepicker5">

                </div>

                <div class="form-group row">
                    <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                        <label for="date_picker" class="col-3">end Date:</label>
                        <input name="end_date" type="text" class="form-control datetimepicker-input col-8" data-target="#datetimepicker4" id="datetimepicker4" />
                        <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                        </div>
                    </div>
                </div>




                <div class="modal-footer">
                    <a href="/task" class="btn btn-secondary">Close</a>
                    <input type="submit" class="btn btn-primary" value="save" />
                </div>

            </div>

        </form>

    </div>

</div>

@endsection