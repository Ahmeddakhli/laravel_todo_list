<!-- New Task Form -->
   <form action="{{ route('tasks.store') }}" method="POST" class='form-horizontal'  enctype="multipart/form-data" >
                @csrf

    <!-- Task Name -->
    <div class="form-group">
        <label for="task-name" class="col-sm-3 control-label">Task Name</label>

        <div class="col-sm-6">
            <input type="text" name="name" id="task-name" class="form-control" value="{{ old('name') }}">
        </div>
    </div>

    <!-- Task Description -->
    <div class="form-group">
        <label for="task-description" class="col-sm-3 control-label">Description</label>

        <div class="col-sm-6">
            <textarea name="description" id="task-description" class="form-control" value="{{ old('description') }}" maxlength="155"></textarea>
        </div>
    </div>
      <!-- Task start date -->
    <div class="form-group">
        <label for="task-description" class="col-sm-3 control-label">start date</label>

        <div class="col-sm-6">
            <input  type="date"name="start_date" id="task-description" class="form-control" value="{{ old('start_date') }}">
        </div>
    </div>

      <!-- Task end_date -->
    <div class="form-group">
        <label for="task-description" class="col-sm-3 control-label">end date</label>

        <div class="col-sm-6">
            <input  type="date"name="end_date" id="task-description" class="form-control" value="{{ old('end_date') }}">
        </div>
    </div>


    <div class="form-group ">
            <label for="task-description" class="col-sm-3 control-label">image</label>

        <div class="col-sm-6">
        <input type="file" name="image"   multiple   class=" form-control">

        </div>
        </div>
    <!-- Add Task Button -->
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-default">
               <span class="fa fa-plus fa-fw" aria-hidden="true"></span> Create Task
            </button>
        </div>
    </div>

</form>