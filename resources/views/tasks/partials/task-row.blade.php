<tr>

    <!-- Task Id -->
    <td class="table-text">
        {{ $task->id }}
    </td>

    <!-- Task Name -->
    <td class="table-text">
        {{ $task->name }}
    </td>

    <!-- Task Description -->
    <td>
        {{ $task->description }}
    </td>
<td>
        {{  $task->start_date }}
    </td>
    <td>
        {{ $task->end_date }}
    </td>
    <!-- Task Status -->
    <td>

        @if ($task->completed === 1)

            <span class="label label-success">
                Complete
            </span>

        @else

            <span class="label label-default">
                Incomplete
            </span>

        @endif

    </td>

 <td>
          <img src="/storage/images/{{ $task->image }}" width="100px">

      
    </td>

    <!-- Task Edit Icon -->
    <td>
        <a href="{{ route('tasks.edit', $task->id) }}" class="pull-right">
            <span class="fa fa-pencil fa-fw" aria-hidden="true"></span>
            <span class="sr-only">Edit Task</span>
        </a>
        @if($task->end_date>now())
                  <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class='form-inline pull-right'  enctype="multipart/form-data" >
                   @csrf
                  @method("DELETE")
                              <button type="submit" >
                                 <span class="fa fa-trash fa-fw" aria-hidden="true"></span> 
                                </button>


               </form>
        @endif
          

    </td>
</tr>