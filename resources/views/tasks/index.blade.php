<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo List</title>
</head>
<body>
    <h1>Todo List</h1>
    <ul>
        @foreach($tasks as $task)
            <li>{{ $task->name }}</li>
        @endforeach
    </ul>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Enter task">
        <button type="submit">Add Tasks</button>
    </form>
</body>
</html>
