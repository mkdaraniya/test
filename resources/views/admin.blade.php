@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    Hello Admin!

                    <form method="post" action="{{ route('admin.cal') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Calculation : </label>
                            <input type="text" name="calculation" class="form-control  @error('calculation') is-invalid @enderror" id="calculation" placeholder="SUM(A2,B2,0)">
                        </div>

                        @error('calculation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input type="submit" value="Submit">
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection