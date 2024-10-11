<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room List</title>
</head>
<body>
    <h1>Room List</h1>
    <ol>
        @foreach ($rooms as $room)
            <li>
                <h2>{{ htmlspecialchars($room->getName()) }}</h2>
                <ul>
                    @foreach ($room as $key => $value)
                        <li>
                            <strong>{{ htmlspecialchars($key) }}:</strong> {{ htmlspecialchars($value) }}
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ol>
</body>
</html>