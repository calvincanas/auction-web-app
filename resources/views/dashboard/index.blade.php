@extends('layouts.app')

@section('content')
    <div>
        <img src="https://i.pinimg.com/564x/b8/e8/1b/b8e81bb275b8e008b34dea429c6683ed.jpg">
        <h2>Latest Bid Amount: <span id="totalAmount">{{ $amount }}</span></h2>
        <p>Latest Bidder: <span id="lastBidderName">{{ $last_bidder->name }}</span></p>
        <button id="newbid-btn">Bid</button>
    </div>


@endsection

@section('footer-js')
    <script type="module">
        $('#newbid-btn').click(function () {
            $.get('/new-bid');
        });

        // gawa muna tayo ng isang auction room
        Echo.private(`auction`)
            .listen('NewSubmittedBid', (e) => {
                const totalAmount = e.bidData.amount;
                const lastBidderName = e.bidData.last_bidder.name;

                $('#totalAmount').text(totalAmount);
                $('#lastBidderName').text(lastBidderName);
            })
    </script>
@endsection


