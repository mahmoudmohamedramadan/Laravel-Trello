@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <button class="btn btn-lg btn-block btn-outline-success mb-2">
                                {{ session()->get('success') }}
                            </button>
                        @endif

                        <form action="{{ route('save_new_card') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Card Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Card Name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" placeholder="Enter Card Description"
                                    style="height: 100px;min-height: 100px;max-height: 150px;">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="top">
                                <label class="form-check-label" for="top" style="cursor: pointer;">Top</label>
                                <small class="form-text text-muted">Determine if the card will be inserted into the
                                    top.</small>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" class="form-control" name="date" value="{{ old('date') }}">
                                @error('date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
