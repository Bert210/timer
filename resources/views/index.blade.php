@extends('layouts.master')

@section('body')
    <div class="row">
        <div class="col-sm-12 col-lg-4">
            <div class="card">
                <div class="card-header justify-content-space-around">
                    Queue - <span class="badge badge-primary">4</span>
                     
                </div>

                <div class="card-body">

                    @foreach($queued as $queue)
                        <queuecard></queuecard> 
                    @endforeach

                </div>
            </div>

        </div>
        <div class="col-sm-12 col-lg-4">
                <div class="card">
                    <div class="card-header justify-content-space-around">
                        Processing <span class="badge badge-light">4</span>
                    </div>
    
                    <div class="card-body">
                        <div class="card">
                            <div class="card-head bg-warning p-1"><h3>1234</h3></div>
                            <div class="card-body">
                                Apple sauce
                            <hr class="mb-0">
                            <div class="text-muted font-italic small float-right">Create at 11/12/14 12:14PM</div>
    
                            </div>
                        </div>
    
                    </div>
                </div>
    
            </div>
            <div class="col-sm-12 col-lg-4">
                    <div class="card">
                        <div class="card-header justify-content-space-around">
                            Completed <span class="badge badge-light">4</span>
                        </div>
        
                        <div class="card-body">
                            <div class="card">
                                <div class="card-head bg-warning p-1"><h3>1234</h3></div>
                                <div class="card-body">
                                    Apple sauce
                                <hr class="mb-0">
                                <div class="text-muted font-italic small float-right">Create at 11/12/14 12:14PM</div>
        
                                </div>
                            </div>
        
                        </div>
                    </div>
        
                </div>
        {{-- <div class="col-sm-12 col-lg-4">Processing</div>
        <div class="col-sm-12 col-lg-4">Completed</div> --}}
    </div>

@endsection