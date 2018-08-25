@extends('layouts.master')

@section('body')
    <div class="row">
        <div class="col-sm-12 col-lg-4">
            <QueueCardWrapper></QueueCardWrapper>            
        </div>
        <div class="col-sm-12 col-lg-4">
            <ProcressingCardWrapper></ProcressingCardWrapper>
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