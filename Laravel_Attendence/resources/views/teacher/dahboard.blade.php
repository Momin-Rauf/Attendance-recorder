<!-- teacher/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome, Teacher!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2, h3 {
            color: #333;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome, Teacher!</h1>
    </header>
    <main>
        <h2>Your Classes:</h2>
        @foreach ($classes as $class)
            <h3>{{ $class->classname }}</h3>
            <ul>
                @foreach ($class->sessions as $session)
                    <li>
                        <a href="{{ route('teacher.markAttendance', $session->id) }}">
                            Session: {{ $session->starttime }} - {{ $session->endtime }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endforeach
    </main>
</body>
</html>
