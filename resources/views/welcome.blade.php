<x-layout>

    <div class="mainContent">
        <h1>Incomplete Tasks:</h1>
        <ul>

            @foreach ($tasks as $task)
                @if (!$task->is_complete)
                    <form action="/complete/{{ $task->id }}" method="post">
                        @csrf
                        <li>{{ $task->description }} <button style="margin-left: 25px" type="submit">Complete
                                Task</button>
                        </li>
                    </form>
                @endif
            @endforeach
            <!--This is a comment-->
            <!--Second comment-->
        </ul>
        <form action="/tasks" method="post">
            @csrf
            <input type="text" name="description" id="">
            @if ($errors->any())
                <div style="color: red">

                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach

                </div>
            @endif
            <div>
                <button type="submit">Add Task</button>
            </div>
        </form>

        <h1>Completed Tasks</h1>
        <ul>

            @foreach ($tasks as $task)
                @if ($task->is_complete)
                    <form action="/delete/{{ $task->id }}" method="post">
                        @method('DELETE')
                        @csrf
                        <li>{{ $task->description }} <button style="margin-left: 25px" type="submit">Delete</button>
                        </li>
                    </form>
                @endif
            @endforeach
    </div>

</x-layout>
