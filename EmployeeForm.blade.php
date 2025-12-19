<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATSU Employee Profile Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }
        h2 {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: inline-block;
            width: 120px;
            font-weight: bold;
        }
        input, select {
            padding: 5px;
            width: 250px;
        }
        button {
            padding: 8px 16px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>CATSU Employee Profile Form</h1>
        
        @if(isset($employee))
            <!-- Edit Form -->
            <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                @csrf
        @else
            <!-- Create Form -->
            <form action="/submit" method="POST">
                @csrf
        @endif
        
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" 
                       value="{{ isset($employee) ? $employee->name : old('name') }}" required>
            </div>
            
            <div class="form-group">
                <label for="department">Department:</label>
                <input type="text" id="department" name="department" 
                       value="{{ isset($employee) ? $employee->department : old('department') }}" required>
            </div>
            
            <div class="form-group">
                <label for="position">Position:</label>
                <input type="text" id="position" name="position" 
                       value="{{ isset($employee) ? $employee->position : old('position') }}" required>
            </div>
            
            <button type="submit">
                {{ isset($employee) ? 'Update Employee' : 'Submit' }}
            </button>
        </form>

        @if(isset($employee))
            <br>
            <a href="{{ route('employees.list') }}">Back to Employee List</a>
        @endif
    </div>
</body>
</html>