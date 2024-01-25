<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Employee Form</title>

        @vite(["resources/js/app.js"])
    </head>
<body>
    <div class="table-show-container">
        <div class="message-container">
            @if(session()->has('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{session('success')}}
                </div>
            @endif
        </div>
        <div class="table-show">
            <h1 class="mb-3">Employee Table</h1>
            <table class="employee-table table table-striped">
                <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Province</th>
                    <th scope="col">City</th>
                    <th scope="col">Street Address</th>
                    <th scope="col">Zip Code</th>
                    <th scope="col">KTP Numer</th>
                    <th scope="col">Current Position</th>
                    <th scope="col">Bank Account</th>
                    <th scope="col">Bank Account Number</th>
                    <th scope="col" colspan="2" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee )
                        <tr>
                            <td>{{$employee->first_name}}</td>
                            <td>{{$employee->last_name}}</td>
                            <td>{{$employee->date_of_birth}}</td>
                            <td>{{$employee->phone}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->province}}</td>
                            <td>{{$employee->city}}</td>
                            <td>{{$employee->street}}</td>
                            <td>{{$employee->zip_code}}</td>
                            <td>{{$employee->ktp_number}}</td>
                            <td>{{$employee->current_position}}</td>
                            <td>{{$employee->bank_account}}</td>
                            <td>{{$employee->bank_account_number}}</td>
                            <td>
                                <a href="{{route('table.edit', ['table' => $employee])}}" class="btn btn-secondary">Edit</a>
                            </td>
                            <td>
                                <form method="post" action="{{route('table.delete', ['table' => $employee])}}">
                                    @csrf
                                    @method('delete')
                                    <input class="btn btn-danger" type="submit" value="Delete" />
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="add-employee-container">
                <a href="/table/create" class="btn btn-primary">Add Employee</a>
            </div>
        </div>
    </div>
</body>
<script>
    setTimeout(function () {
        document.querySelector('.message-container').classList.add('d-none');
    }, 2000);
</script>
</html>
