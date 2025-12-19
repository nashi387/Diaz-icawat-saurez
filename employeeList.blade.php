<!DOCTYPE html>
<html>
    <head>
        <title>Employee List</title>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
            .actions a {
                margin-right: 10px;
                text-decoration: none;
                padding: 5px 10px;
                border: 1px solid #007bff;
                border-radius: 3px;
                color: #007bff;
            }
            .actions a:hover {
                background-color: #007bff;
                color: white;
            }
            .delete-btn {
                background: none;
                border: 1px solid #dc3545;
                color: #dc3545;
                padding: 5px 10px;
                border-radius: 3px;
                cursor: pointer;
            }
            .delete-btn:hover {
                background-color: #dc3545;
                color: white;
            }
            .delete-form {
                display: inline;
            }
        </style>
    </head>
    <body>
        <h1>All Employees</h1>

        @if(session('success'))
            <div style="color: green; margin-bottom: 15px;">
                {{ session('success') }}
            </div>
        @endif

        <table border="1" cellpadding="8">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Position</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            @foreach ($employees as $emp)
            <tr>
                <td>{{ $emp->id }}</td>
                <td>{{ $emp->name }}</td>
                <td>{{ $emp->department }}</td>
                <td>{{ $emp->position }}</td>
                <td>{{ $emp->created_at }}</td>
               <td class="actions">
    <a href="{{ route('employees.edit', $emp->id) }}">Edit</a>
    
    {{-- DELETE FORM - MUST use POST method --}}
    <form action="{{ route('employees.delete', $emp->id) }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="delete-btn" 
                onclick="return confirm('Are you sure you want to delete this employee?')">
            Delete
        </button>
    </form>
</td>
            </tr>
            @endforeach    
        </table>
        <br>
        <a href="/register">Register New Employee</a>
    </body>
</html>