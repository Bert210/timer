@extends('layouts.master')

@section('body')
    <div class="row">
        <div class="col-sm-12 col-lg-4">
            <div class="card">
                <div class="card-header justify-content-space-around">
                    Queue - <span class="badge badge-primary">{{ count($queued) }}</span>
                     
                </div>

                <div class="card-body">

                    @foreach($queued as $queue)
                        <queuecard
                            :data="{{ $queue }}"
                        ></queuecard> 
                    @endforeach

                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="card">
                <div class="card-header justify-content-space-around">
                    Processing - <span class="badge badge-primary">{{ count($inProgress) }}</span>
                     
                </div>

                <div class="card-body">

                    @foreach($inProgress as $progress)
                        <progresscard
                            :data="{{ $progress }}"
                        ></progresscard> 
                    @endforeach

                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="card">
                <div class="card-header justify-content-space-around">
                    Completed - <span class="badge badge-primary">{{ count($completed) }}</span>
                     
                </div>

                <div class="card-body">

                    @foreach($completed as $complete)
                        <completedcard
                            :data="{{ $complete }}"
                        ></completedcard> 
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection