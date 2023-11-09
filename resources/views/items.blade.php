@extends('layouts.main')

@section('content')
   
    @include('my_comp.modal')

    <div class="container">
        <div class='row'>
            <div class="col-md-3 mt-4">
                <form action="">

                    <div class='block card p-3 mb-2'>

                        <div class='h2'>Поиск:</div>

                        <div class="input-group">
                        <div class="form-outline">
                            <input value='{{ $req_search }}' name='search' type="search" id="form1" class="form-control" />
                            <label class="form-label" for="form1"></label>
                        </div>
                        <button type="" class="btn btn-primary">
                            <i class="fas fa-search"></i> Поиск
                        </button>
                        </div>

                    </div>

                    <div class='block card p-3 mb-2'>

                        <div class='h2'>Жанр:</div>

                        @foreach ($genres as $item)


                            <div class="col-sm-4">
                                <div class="form-check form-switch">
                                    <input name='genre_ids[]'  {{ in_array($item->id, $req_genre_ids ) ? 'checked' : 0 }}   value='{{ $item->id }}' class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"> {{ $item->name }} </label>
                                </div>  
                            </div>

                        @endforeach

                    </div>

                    <div class='block card p-3 mb-2'>

                        <div class='h2'>Авторы:</div>

                        @foreach ($authors as $item)


                            <div class="col-sm-4">
                                <div class="form-check form-switch">
                                    <input name='author_ids[]'  {{ in_array($item->id, $req_author_ids ) ? 'checked' : 0 }}   value='{{ $item->id }}' class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"> {{ $item->name }} </label>
                                </div>  
                            </div>

                        @endforeach

                    </div>
                   

                    <button class='btn btn-primary'>Фильтрация</button>

                </form>
            </div>
            <div class='col-md-9'>

                <div class="row"> 

                    @foreach ($items as $item)

                        <div class="col-sm-4">
                            <div class="card mt-4" style="width: 18rem;">
                            <img src="images/main.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">   {{ $item->name }}</h5>
                                <p class="card-text">
                                    
                                    AUTHOR:    {{ $item->author->name }}
                                
                                    <br>

                                    GENRE:   

                                    @foreach ($item->genres as $genre) 

                                        {{ $genre->name }},

                                    @endforeach
                              
                            
                                </p>
                                <button type="button" class="btn btn-primary item" data-id='{{ $item->id}}' id='item'>
                                   Забронировать
                                </button>
                            </div>
                            </div>
                        </div>

                    @endforeach
                
                </div>

            </div>
        </div>
    </div>

    <script>

        function checkItem(id) {
            return $.ajax({
                url: "/items/check/" + id,
                type:"GET",
                data:{"_token": "{{ csrf_token() }}"}
            });
        }

        function changeInModalItem(modal_id,json){
            
            $('#'+ modal_id + ' .author').text(json.author)
            $('#'+ modal_id + ' .id').text(json.id)
            $('#'+ modal_id + ' .genre').text(json.genre)
            $('#'+ modal_id + ' .name').text(json.name)

        }
        

        $('.item').on('click', function(event){

            var id = $(this).data('id');
            var response = checkItem(id)

            response.done(function (data) {
                
                let json = JSON.parse(data);

                changeInModalItem('myModal', json)
                myModal.show()
            })

        })


    </script>

@endsection