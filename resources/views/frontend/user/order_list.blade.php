@extends('frontend.master')

@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')
           
           <div class="col-md-8">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr style="background: #e2e2e2"></tr>
                    </tbody>
                </table>

            </div>

           </div>

        </div>

    </div>

</div>

@endsection