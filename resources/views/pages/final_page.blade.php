@extends('layouts.header')

@section('content')
    <div class="container" id="finalContainer">
        <p>Start Date: {{ $startDate->format('Y-m-d') }}</p>
        <p>End Date: {{ $endDate->format('Y-m-d') }}</p>

        <h3>Matching Tool IDs:</h3>
        @foreach ($matchingToolIds as $toolId)
            <p>{{ $toolId }}</p>
        @endforeach

        <div>
            <p>Sisak: {{ count($sisakmeret) }} db</p>
            @if(count($sisakmeret) > 0)
                <ul>
                    @foreach($sisakmeret as $index => $size)
                        <li>Sisak {{ $index + 1 }}: Méret - {{ $size }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

    </div>
@endsection