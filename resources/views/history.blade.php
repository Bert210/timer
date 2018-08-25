@extends('layouts.master')

@section('body')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Date</th>
            <th scope="col">Stock / Tag #</th>
            <th scope="col">Type</th>
            <th scope="col">Status</th>
            <th scope="col">Employee</th>
            <th scope="col">Time in Queue</th>
            <th scope="col">Time to Finish</th>
            <th scope="col">Total Time</th>

        </tr>
        </thead>
        <tbody>
            @foreach($jobs as $job)
            <tr>
                <td>{{ $job->created_at }}</td>
                <td>{{ $job->stock_tag_number }}</td>
                <td>{{ $job->type_id }}</td>
                <td>{{ $job->status_id }}</td>
                <td>{{ $job->employee_id }}</td>
                <td>{{ $job->queue }}</td>
                <td>{{ $job->processing }}</td>
                <td>{{ $job->total_time }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


    
@endsection