<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Task</title>
</head>
<body>
    <h1>Add Task</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Enter task">
        <button type="submit">Add Task</button>
    </form>
</body>
</html>
