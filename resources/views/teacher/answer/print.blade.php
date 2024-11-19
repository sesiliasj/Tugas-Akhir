<!DOCTYPE html>
<html>

<head>
    <title>Answer Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;
        }

        .breadcrumb {
            font-size: 14px;
            margin-bottom: 20px;
        }

        .breadcrumb-item {
            display: inline-block;
        }

        .breadcrumb-item:not(:last-child)::after {
            content: " > ";
        }

        .section {
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
        }

        .content {
            border: 1px solid #ddd;
            padding: 10px;
            background: #f9f9f9;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>{{ $exam->name }}</h1>
    </div>

    <div class="section">
        <div class="form-group">
            <label>Name:</label>
            <span>{{ $student->name }}</span>
        </div>
        <div class="form-group">
            <label>Exam:</label>
            <span>{{ $exam->name }}</span>
        </div>

        <div class="form-group">
            <label>Course:</label>
            <span>{{ $course->name }}</span>
        </div>

        @foreach ($examcontents as $index => $examcontent)
            <div class="form-group">
                <label>Question {{ $index + 1 }}:</label>
                <div class="content">
                    {!! $examcontent['content'] !!}
                </div>
            </div>

            @if (isset($answers[$index]))
                <div class="form-group">
                    <label>Answer:</label>
                    <div class="content">
                        {!! $answers[$index]['answer'] !!}
                    </div>
                </div>

                <div class="form-group">
                    <label>AI Score:</label>
                    <span>{{ $answers[$index]['score'] !== null ? $answers[$index]['score'] . '%' : 'null' }}</span>
                </div>
            @else
                <div class="form-group">
                    <label>Answer:</label>
                    <span>No answer available.</span>
                </div>
            @endif
        @endforeach
    </div>
</body>

</html>
