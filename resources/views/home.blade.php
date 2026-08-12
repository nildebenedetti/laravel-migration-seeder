@extends("layouts.master")

@section("title")
Home
@endsection

@section("content")
<div class="hero-banner">
    <h2>Welcome to the Train Station</h2>
</div>
<div class="container my-4">
    <h1 class="tt-title mb-3">Trains Timetable</h1>
    <div class="table-responsive tt-table-wrapper rounded-3 shadow-lg">
        <table class="table table-dark table-hover align-middle mb-0">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Train Code</th>
                <th scope="col">Operating Company</th>
                <th scope="col">Schedule Date</th>
                <th scope="col">Departure Station</th>
                <th scope="col">Departure Time</th>
                <th scope="col">Arrival Station</th>
                <th scope="col">Arrival Time</th>
                <th scope="col">Status</th>
                <th scope="col">Delay</th>
                </tr>
            </thead>
            <tbody>     
                @foreach ($trains as $train)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><span class="badge bg-warning text-dark">{{ $train->train_code }}</span></td>
                        <td>{{ $train->company }}</td>
                        <td>{{ $train->next_planned }}</td>
                        <td>{{ $train->departure_station }}</td>
                        <td>{{ $train->departure_time }}</td>
                        <td>{{ $train->arrival_station }}</td>
                        <td>{{ $train->arrival_time }}</td>
                        <td>{{ $train->status }}</td>
                        <td>{{ $train->status === 'delayed' || $train->status === 'early' ? $train->delay_minutes . ' mins' : '-' }}</td>
                    </tr>    
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection