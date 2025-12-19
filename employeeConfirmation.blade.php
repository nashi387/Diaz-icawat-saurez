<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Created Successfully</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }
        .success {
            font-weight: bold;
            margin-bottom: 15px;
        }
        .detail {
            margin-bottom: 10px;
        }
        .detail-label {
            display: inline-block;
            width: 120px;
            font-weight: bold;
        }
        .back-link {
            margin-top: 20px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <h1>Profile Created Successfully</h1>
        
        <div class="field">
            <span class="label">ID:</span>
            <span class="value">{{ $employee->id }}</span>
        </div>
        
        <div class="field">
            <span class="label">Name:</span>
            <span class="value">{{ $employee->name }}</span>
        </div>
        
        <div class="field">
            <span class="label">Department:</span>
            <span class="value">{{ $employee->department }}</span>
        </div>
        
        <div class="field">
            <span class="label">Position:</span>
            <span class="value">{{ $employee->position }}</span>
        </div>
        
        <div class="field">
            <span class="label">Created At:</span>
            <span class="value">{{ $employee->created_at }}</span>
        </div>
        
        <div class="link">
            <a href="/register">Register another employee</a>
            <br>
            <a href="/employees">view Employee List (Admin only)</a>
        </div>
    </div>
</body>
</html>