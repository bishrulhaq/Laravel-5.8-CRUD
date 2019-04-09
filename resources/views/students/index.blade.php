@extends('students.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Simple Student Management CRUD Application</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-success " href="{{ route('students.create') }}"> Add Student</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if(sizeof($students) > 0)
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Details</th>
                <th width="280px">More</th>
            </tr>
            @foreach ($students as $student)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->detail }}</td>
                    <td>
                        <form action="{{ route('students.destroy',$student->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('students.show',$student->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <div class="alert alert-alert">Start Adding to the Database.</div>
    @endif

    {!! $students->links() !!}

@endsection