@extends('layouts.header')

@section('content')
    <form action="{{ route('pages.final_page', ['motor' => $motor->id]) }}" method="POST">
        @csrf
        <div class="container" id="loanContainer">
            <div class="motor-image">
                <img src="{{ asset('storage/img/placeholder.png') }}" alt="">
            </div>
            <div class="motor-name">{{ $motor->brand }} - {{ $motor->type }}</div>

            <div class="clearfix">
                <div class="left-section">
                    <div class="product-list">
                        <h3>Termékek</h3>
                        <br>
                        <p><small>A sisak napi ára: <strong>{{ $helmetDailyPrice }}</strong> Ft-nak felel meg.</small></p>
                        <p><small>A ruházat napi ára: <strong>{{ $clothingDailyPrice }}</strong> Ft-nak felel meg.</small></p>
                        <p><small>A cipők napi ára: <strong>{{ $bootDailyPrice }}</strong>Ft-nak felel meg</small></p>
                        
                        <p><small>A sisak, cipőért és a ruházatért kauciót számítunk fel, mely <strong>{{ $helmetDeposit }}, {{ $bootDeposit }}</strong>
                                és <strong>{{ $clothingDeposit }}</strong> Ft.</small></p>
                        <br>
                        <p>Motor: {{ $motor->brand }} - {{ $motor->type }}</p>

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

                        <div>
                            <p>Ruházat: {{ count($ruhameret) }} db</p>
                            @if(count($ruhameret) > 0)
                                <ul>
                                    @foreach($ruhameret as $index => $size)
                                        <li>Ruházat {{ $index + 1 }}: Méret - {{ $size }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        <div>
                            <p>Cipők: {{ count($cipomeret) }} db</p>
                            @if(count($cipomeret) > 0)
                                <ul>
                                    @foreach($cipomeret as $index => $size)
                                        <li>Cipők {{ $index + 1 }}: Méret - {{ $size }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        <br>
                        <p>Kezdő dátum: {{ $startDateRaw }}</p>
                        <p>Végső Dátum: {{ $endDateRaw }}</p>
                        <p><strong>Bérlési napok száma:</strong> {{ $startDate->diffInDays($endDate) + 1 }} nap</p>
                    </div>
                </div>

                <div class="right-section">
                    <div class="summary">
                        <h3>Összesítés</h3>
                        <p>Motor napi összeg: <span id="total">{{ number_format($motor->price, 0, '.', ' ') }}</span> Ft</p>
                        @if($helmetCost > 0)
                            <p><small><strong>Sisak költsége:</strong> {{ number_format($helmetCost, 0, '.', ' ') }} Ft</small>
                            </p>
                        @endif
                        @if($clothingCost > 0)
                            <p><small><strong>Ruházat költsége:</strong> {{ number_format($clothingCost, 0, '.', ' ') }}
                                    Ft</small></p>
                        @endif
                        @if ($bootCost > 0)
                            <p><small><strong>Cipők költsége:</strong> {{ number_format($bootCost, 0, '.', ' ') }}
                                    Ft</small></p>
                        @endif


                        <p>Kedvezmény: <span id="discount">{{ number_format($discount, 0, '.', ' ') }} Ft</span></p>
                        <p>Fizetendő összeg: <span id="payable">{{ number_format($payable, 0, '.', ' ') }}</span> Ft</p>
                    </div>
                    <button class="payment-button">Fizetés</button>
                </div>
            </div>
        </div>
    </form>

@endsection