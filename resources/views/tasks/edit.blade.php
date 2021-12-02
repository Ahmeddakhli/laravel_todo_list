@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <!-- Display Validation Errors -->
                @include('common.status')

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Editing Task <strong>{{$task->name}}</strong>
                    </div>
                    <div class="panel-body">


                <form action="{{ route('tasks.update', $task->id) }}" method="POST" class='form-horizontal'  enctype="multipart/form-data" >
                   @csrf
                  @method("PUT")
                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task Name</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ $task->name }}">
                            </div>
                        </div>

                        <!-- Task Description -->
                        <div class="form-group">
                            <label for="task-description" class="col-sm-3 control-label">Description</label>

                            <div class="col-sm-6">
                                <textarea name="description" id="task-description" class="form-control" value="{{ old('description') }}" maxlength="155"> {{$task->description }}</textarea>
                            </div>
                        </div>
                            <!-- Task start date -->
                                <div class="form-group">
                                    <label for="task-description" class="col-sm-3 control-label">start date</label>

                                    <div class="col-sm-6">
                                        <input  type="date"name="start_date" id="task-description" class="form-control" value="{{$task->start_date }}">{{$task->start_date }}
                                    </div>
                                </div>

                                <!-- Task end_date -->
                                <div class="form-group">
                                    <label for="task-description" class="col-sm-3 control-label">end date</label>

                                    <div class="col-sm-6">
                                        <input  type="date"name="end_date" id="task-description" class="form-control" value="{{ $task->end_date }}">{{ $task->end_date }}
                                    </div>
                                </div>


                                <div class="form-group ">
                                        <label for="task-description" class="col-sm-3 control-label">image</label>

                                    <div class="col-sm-6">
                                    <input type="file" name="image"   multiple   class=" form-control">

                                    </div>
                                    </div>

                            <!-- Task Status -->

                            <div class="form-group row">
                                <label for="status" class="col-sm-3 col-sm-offset-1 control-label text-right">Status</label>
                                <div class="col-sm-6">
                                    <div class="checkbox">
                                        <label for="status">
                                            {!! Form::checkbox('completed', 1, null, ['id' => 'status']) !!} Complete
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <!-- Add Task Button -->
                            <div class="form-group row">
                                <div class="col-sm-offset-4 col-sm-6">
                                     {{Form::button('<span class="fa fa-save fa-fw" aria-hidden="true"></span> <span class="hidden-xxs">Save</span> <span class="hidden-xs">Changes</span>', array('type' => 'submit', 'class' => 'btn btn-success btn-block'))}}
                                </div>
                            </div>


                        </form>

                    </div>
                    <div class="panel-footer">
                        <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-info" type="button">
                            <span class="fa fa-reply" aria-hidden="true"></span> Back to Tasks
                        </a>
@if($task->end_date>now())
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class='form-inline pull-right'  enctype="multipart/form-data" >
                   @csrf
                  @method("DELETE")
                              <button type="submit" class="btn btn-danger">
                                  <span class="fa fa-trash fa-fw" aria-hidden="true"></span> <span class="hidden-xxs">Delete</span> <span class="hidden-sm hidden-xs">Task</span>
                                </button>


               </form>
@endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection