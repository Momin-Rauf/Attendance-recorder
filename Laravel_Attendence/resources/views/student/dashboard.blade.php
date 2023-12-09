<!-- student/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome, Student!</title>
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
            color: #333;
        }

        p {
            color: #333;
        }

        li.present {
            color: green;
            font-weight: bold;
        }

        li.absent {
            color: red;
            font-weight: bold;
        }

        li.warning {
            color: yellow;
            font-weight: bold;
        }


        li.dangerous {
            color: red;
            font-weight: bold;
        }

        li.safe {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome, Student!</h1>
    </header>
    <main>
        <h2>Your Attendance Records:</h2>
        @if ($attendance->isEmpty())
            <p>No attendance records found.</p>
        @else
            <ul>
                @foreach ($attendance as $record)
                    <li class="{{ $record->isPresent ? 'present' : 'absent' }} {{ $record->percentage < 75 ? 'dangerous' : 'safe' }}">
                        Session: {{ $record->session_starttime }} - {{ $record->session_endtime }}
                        Status: {{ $record->isPresent ? 'Present' : 'Absent' }}
                        <span id="percentage-{{ $record->class_id }}">Attendance: {{ $record->percentage }}%</span>
                    </li>
                @endforeach
            </ul>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    @foreach ($attendance as $record)
                        var percentageElement = document.getElementById('percentage-{{ $record->class_id }}');
                        var percentage = {{ $record->percentage }};
            
                        // Add dummy data for demonstration
                        // You can replace this with your actual percentage data
                        if (!percentage) {
                            percentage = Math.floor(Math.random() * (100 - 50 + 1)) + 50;
                        }
            
                        // Adjust styles based on percentage
                        if (percentage < 75) {
                            percentageElement.classList.add('dangerous');
                        } else if (percentage >= 75 && percentage < 85) {
                            percentageElement.classList.add('warning');
                        } else {
                            percentageElement.classList.add('safe');
                        }
            
                        percentageElement.innerText = 'Attendance: ' + percentage.toFixed(2) + '%';
                    @endforeach
                });
            </script>
            
        @endif
    </main>
</body>
</html>