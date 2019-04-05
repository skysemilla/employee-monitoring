@extends('supervisor.navbar')

@section('content')
<div class="container">
   
                <div class="panel-body">
                   <!--  @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif -->
                        
                        @include('supervisor.ownreportextension')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection