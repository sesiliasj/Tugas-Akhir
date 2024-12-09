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

        .card {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            background: #f9f9f9;
        }

        .card-header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
        }

        .content {
            border: 1px solid #ddd;
            padding: 10px;
            background: #ffffff;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <div class="header">
        <h1>{{ $exam->name }}</h1>
    </div>

    <!-- Exam Details -->
    <div class="card">
        <div class="card-header">Exam Details</div>
        <div class="form-group">
            <label>Student Name:</label>
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
        <div class="form-group">
            <label>Avg AI Score:</label>
            <span>{{ $totalscore }}</span>
        </div>
        <div class="form-group">
            <label>Weight Score:</label>
            <span>{{ $totalweightscore }}</span>
        </div>
    </div>

    <!-- Questions and Answers -->
    @foreach ($examcontents as $index => $examcontent)
        <div class="card">
            <div class="card-header">Question {{ $index + 1 }}</div>
            <div class="form-group">
                <label>Content:</label>
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
                <div class="form-group">
                    <label>Score Weight:</label>
                    <span>{{ $score[$index] !== null ? $score[$index] : 'null' }}</span>
                </div>
            @else
                <div class="form-group">
                    <label>Answer:</label>
                    <span>No answer available.</span>
                </div>
            @endif
        </div>
    @endforeach
</body>

</html>
