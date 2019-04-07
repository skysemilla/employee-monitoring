@extends('headofoffice.navbar')

@section('content')
<div class="container">
   
                <div class="panel-body">
                   <!--  @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif -->
                        
                        @include('headofoffice.reportsforapprovalextension')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection