@extends('layouts.main')

@section('content')

<div class="container mt-4  ">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Наименование книги</th>
            <th scope="col">Забронированный день</th>
            <th scope="col">Книга выдана</th>
            <th scope="col">Дата бронирования</th>
        </tr>
        </thead>
        <tbody>
            
            @foreach($orders as $key =>  $order)

            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $order->item->name }}</td>
                <td>{{ $order->reserve_day }}</td>
                <td>{{ $order->book_is_given}}</td>
                <td>{{ $order->created_at}}</td>
            </tr>

            @endforeach
        
        </tbody>
    </table>
</div>

@endsection