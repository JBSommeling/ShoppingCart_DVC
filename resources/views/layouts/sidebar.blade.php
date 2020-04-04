    <nav id="sidebar">
        <div class="sidebar-header">
            <img src=" {{ asset('img/logo-white.png') }}" alt="logo">
            <h3 class="text-white">ShoppingCart</h3>
        </div>

        <ul class="list-unstyled components">
            @foreach($categories as $category)
            <li>
                <a href="#">{{ $category['name'] }}</a>
            </li>
            @endforeach
        </ul>
    </nav>



