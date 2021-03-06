<div class="tab-pane {{{ $status ?? '' }}}" id="{{ $tab }}">
    <h1>
        {{ $title }}
    </h1>

    <div class="table-responsive">
        <table class="table table-striped task-table table-condensed">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                 <th>start_date</th>
                  <th>end_date</th>
                <th >Status</th>
                 <th>image</th>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    @include('tasks.partials.task-row')
                @endforeach
            </tbody>
        </table>
    </div>
</div>
