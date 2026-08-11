@extends("layouts.master")

@section("title")
Home
@endsection

@section("content")
<div class="text-light p-5">
    <h1 class="mb-3">Twilight Town Trains Timetable</h1>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Train Code</th>
            <th scope="col">Operating Company</th>
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
                    <td>{{ $train->train_code }}</td>
                    <td>{{ $train->company }}</td>
                    <td>{{ $train->departure_station }}</td>
                    <td>{{ $train->departure_time }}</td>
                    <td>{{ $train->arrival_station }}</td>
                    <td>{{ $train->arrival_time }}</td>
                    <td>{{ $train->status }}</td>
                    <td>{{ $train->status === 'delayed' ? $train->delay_minutes . ' mins' : '-' }}</td>
                </tr>    
            @endforeach
        </tbody>
    </table>
</div>s
@endsection