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