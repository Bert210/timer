@extends('layouts.master')

@section('body')

    <div class="card">

        <div class="card-header">History</div>

        <div class="card-body">

            <table id="history-table" class="table table-striped table-bordered">
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
                        <td>{{ $job->created_at_timezone }}</td>
                        <td>{{ $job->stock_tag_number }}</td>
                        <td>{{ $job->type->name }}</td>
                        <td>{{ $job->status->name }}</td>
                        <td>{{ $job->employee->name }}</td>
                        <td>
                            @if($job->status_id > 1)
                            <startendtimeformatter
                                start-time="{{ $job->created_at_timezone }}"
                                end-time="{{ $job->queue }}"
                            ></startendtimeformatter>
                            @endif
                        </td>
                        <td>
                            @if($job->status_id > 2)
                            <startendtimeformatter
                                start-time="{{ $job->queue }}"
                                end-time="{{ $job->processing }}"
                            ></startendtimeformatter>
                            @endif
                        </td>
                        <td>
                            @if($job->status_id > 2)
                                <startendtimeformatter
                                    start-time="{{ $job->created_at_timezone }}"
                                    end-time="{{ $job->processing }}"
                                ></startendtimeformatter>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection