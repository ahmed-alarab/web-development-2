@extends('layouts.app')

@section('content')
    <div class="container text-center my-5" style="background-color: black; margin-top: 50px">
        <h1 class="mb-5" style="font-size: 4rem; color: white">Reports</h1>

        <div class="row justify-content-center g-4">
            <div class="col-md-5 col-lg-4 btn-cnt">
                <form action="{{ route('total-earnings') }}" method="get">
                    @csrf
                    <button type="submit" class="report-btn" style="background-color: greenyellow;">
                        Total Earnings
                    </button>
                </form>
            </div>
            <div class="col-md-5 col-lg-4 btn-cnt">
                <form action="{{ route('driver-performance') }}" method="get">
                    @csrf
                    <button type="submit" class="report-btn" style="background-color: cornflowerblue;">
                        Driver Performance
                    </button>
                </form>
            </div>
            <div class="col-md-5 col-lg-4 btn-cnt">
                <form action="{{ route('client-spending') }}" method="get">
                    @csrf
                    <button type="submit" class="report-btn" style="background-color: mediumpurple;">
                        Client Spending
                    </button>
                </form>
            </div>
            <div class="col-md-5 col-lg-4 btn-cnt">
                <form action="{{ route('demand-trends') }}" method="get">
                    @csrf
                    <button type="submit" class="report-btn" style="background-color: orangered;">
                        Demand Trends
                    </button>
                </form>
            </div>
        </div>
    </div>

    <style>
        .report-btn {
            width: 90%;
            height: 200px;
            font-size: 2rem;
            font-weight: bold;
            color: black;
            border: none;
            border-radius: 12px;
            transition: transform 0.2s ease;
        }

        .report-btn:hover {
            transform: scale(1.03);
        }
        .btn-cnt{
            width: 40%;
            margin: 5%;
        }
    </style>
@endsection
