@extends('layouts.app')

@section('navbar-content')
<div class="ui one column grid item">
    <div class="ui floating labeled icon dropdown button">
        <i class="filter icon"></i>
        <span class="text">Categories</span>
        
        <div class="menu">
            <div class="header">
                Search Category
            </div>
            <div class="ui left icon input">
                <i class="search icon"></i>
                <input type="text" name="search" placeholder="Search...">
            </div>

            <div class="header">
                <i class="tags icon"></i>
                Filter by Category
            </div>
            @foreach($categories as $category)
            <div class="item">{{ $category->name }}</div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="ui grid centered">

    <div class="twelve wide column content-container">
    <div class="ui four stackable cards">
        @foreach($suggestions as $suggestion)
        <div class="ui card">
            <div class="image">
                <img src="{{ $suggestion->img_src }}">
            </div>
            <div class="content card-content">
                <div class="header">
                    <span class="card-header">{{ $suggestion->name }}</span>
                </div>
                <div class="meta">
                    <span class="card-content">Rating: {{ $suggestion->rating }}</span>
                </div>
                <div class="description">
                    <span class="card-content"> {{ $suggestion->location }} </span>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    </div>

</div>
@endsection

@section('scripts')

<script type="text/javascript">
    $('.ui.dropdown').dropdown();

    function getSuggestionsByCategory($id){
        $.ajax({
            type: 'POST',
            url: '/suggest',
            data: {categoryID: $id},
            success: function($suggestions){
                
            }
        });
    }
</script>

@endsection
