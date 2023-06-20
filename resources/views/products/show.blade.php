@extends('layouts.app')

@section('content')
    <div class="p-5 text-center">
        <img class="img" src="https://i.pinimg.com/564x/b8/e8/1b/b8e81bb275b8e008b34dea429c6683ed.jpg">
        <h1 class="text-body-emphasis">{{ $product->name }}</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center text-capitalize">
                        <h6>Current Bid</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center text-capitalize">
                        <h6>Latest Bidder</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center text-capitalize">
                        <h6>$<span id="totalAmount">{{ $total ?? 0 }}</span></h6>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center text-capitalize">
                        <h6 id="lastBidderName">{{ $lastBidder->user->name ?? 'Unknown' }}</h6>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button class="btn btn-info" id="bid-btn">
                    <h4>Bid</h4>
                </button>
            </div>
        </div>
    </div>


@endsection

@section('footer-js')
    <script type="module">
        const productId = {{ $product->id }};
        $('#bid-btn').click(function () {
            $.get(`/new-bid/${productId}`);
        });


        Echo.private(`bid.${productId}`)
            .listen('NewSubmittedBid', (e) => {
                const totalAmount = e.bidData.amount;
                const lastBidderName = e.bidData.bid_entry.user.name;

                $('#totalAmount').text(totalAmount);
                $('#lastBidderName').text(lastBidderName);
            })
    </script>
@endsection


