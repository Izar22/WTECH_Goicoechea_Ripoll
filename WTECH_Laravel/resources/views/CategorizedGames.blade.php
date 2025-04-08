<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>8-Bit Market</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <style>
        body {
            font-family: "Kanit", sans-serif;
            margin: 0;
            padding: 0;
            background-color: #222;
        }
        header {
            position: fixed;
            left: 0;
            top: 0;
            width: 100vw;
            height: 70px;
            background-color: #F5B841;
            padding: 15px;
            padding-right: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-sizing: border-box;
            @media (max-width: 768px) {
                padding-right: 15px;
            }
        }
        .menu{
            display:none;
            @media (max-width: 768px) {
                display: block;
                margin-left: 20px;
            }
        }
        h1 {
            font-size: 24px;
            font-weight: bold;
        }
        .search{
            width: 40vw;
            padding: 5px;
            border-radius: 12px;
            @media (max-width: 768px) {
                width: 80vw;
                margin-left: 10vw;
            }
        }
        .search_icon{
            background-color: #ffffff;
            padding: 5px;

        }
        .search_bar{
            display: flex;
            @media (max-width: 768px) {
                display: none;
            }
        }
        .user_actions{
            display: flex;  
        }
        .action{
            margin: 0 15px;
            text-decoration: none;
            color: #000000;
            @media (max-width: 768px) {
                display: none;
            } 
        }
        main {
            background: #FBFFFE;
            height: auto;
            min-height: calc(100vh - 108.4px);
            padding: 20px 40px;
            box-sizing: border-box;
            margin-top: 70px;
            margin-bottom: 35px;
            display: flex;  
            flex-direction: column;
            @media (max-width: 768px) {
                height: auto;
                min-height: calc(100vh - 108.4px);
            }
        }
        .close_btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            color: black;
            font-size: 24px;
            cursor: pointer;
        }
        .sidebar {
            position: fixed;
            top: 70px;
            left: -100vw; 
            width: 100vw;
            height: 100%;
            background: white;
            transition: transform 0.3s ease-in-out;
            padding-top: 60px;
            display: flex;
            flex-direction: column;
            align-items: start;
            text-align: start;
            gap: 20px;
            z-index: 100;
        }
        .sidebar.open {
            transform: translateX(100vw); 
            z-index: 100;
        }
        .title{
            display: flex;
            flex-direction: row;
        }
        .logo{
            height: 70px;
            width: auto;
        }
        .top_section{
            display: flex;
            justify-content: space-between;
            
        }
        .divider{
            width: 100%;
            height: 1px;
            background-color: #000000;
            @media (max-width: 768px) {
                display: none;
            }
        }
        .container{
            display: flex;
            gap: 50px;
            min-height: 477.6px;
        }
        .filters{
            display: flex;
            flex-direction: column;
            min-width: 200px;
            gap: 20px;
            @media (max-width: 768px) {
                display: none;
            }
        }
        .filter{
            display: flex;
            flex-direction: column;
            font-size: 1.17em;
            font-weight: bold;
            gap: 10px;
            @media (max-width: 768px) {
                margin-bottom:10px;
            }
           
        }
        .games{
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;
            gap: 40px;
            max-height: calc(100vh - 280px);
            width: 100%;
            @media (max-width: 768px) {
                max-height: calc(100vh - 350px);               
                margin-left: 15px;
                margin-top: 5px;
            }
        }
        .games_section{
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;
            gap: 40px;
            overflow-y: scroll;
            max-height: calc(100vh - 280px);
            width: 100%;
            @media (max-width: 768px) {
                max-height: calc(100vh - 350px);               
                margin-left: 15px;
                margin-top: 5px;
            }
        }
        .game p{
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
            max-width: 120px;
            height: 24px;
        }
        .image_game{
            width: 120px;
            height: 180px;
        }
        .order_by{
            align-self: end;
            margin-bottom: 16px;
            font-size: 1.17em;
            font-weight: bold;
            @media (max-width: 768px) {
                display: none;
            }
        }
        .order_by_mobile{
            margin-top: 16px;
            align-self: end;
            margin-bottom: 16px;
            font-size: 1.17em;
            font-weight: bold;
        }
        .price_range{
            display: flex;
            gap: 8px;
            width: 75%;
        }
        .button_apply{
            width: 75%;
            margin-top: 20px;
            background-color: #275DAD;
            border: none;
            border-radius: 10px;
            padding: 5px 0;
            color: #ffffff;
        }
        #genre,#platform{
            width: 75%;
        }
        #fromPrice,#toPrice{
            width: 20%;
        }
        .price_icon{
            display: flex;
            justify-content: space-between;
        }
        .price_icon p{
            margin: 0;
        }
        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background: #F5B841;
            text-align: center;
            padding: 10px;
            font-size: 12px;
            z-index: 100;
            box-sizing: border-box;
            height: 38.4px;
        }
        .applied_filters {
            display: flex;
            gap: 10px;
            align-self: end;
            margin-bottom: 9px;
            @media (max-width: 768px) {
                align-self: start;
            }
        }
        .filter_label {
            background-color: #F5B841;
            color: black;
            padding: 5px 10px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
        }
        .filter_label .remove {
            cursor: pointer;
            font-weight: bold;
            padding: 0 5px;
        }
        .articles_pills{
            display: flex;
            gap: 50px;
            @media (max-width: 768px) {
                flex-direction: column;
                gap: 10px;
            }
        }
        .top_section p{
            width: 200px;
            margin-top: 0;           
        }
        .mobile_filters{
            margin-left: 10vw;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .modal_content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }
        .modal button {
            margin: 10px;
            padding: 8px 16px;
            border: none;
            cursor: pointer;
        }
        #confirmLogout {
            background-color: rgb(4, 194, 4);
            color: white;
        }
        #cancelLogout {
            background-color: rgb(255, 0, 0);
            color: white;
        }
        .icon{
            width: 24px;
            height: 24px;
        }
        .pagination {
            display: flex;
            justify-content: center;
            padding-left: 0;
            @media (max-width: 768px) {
                margin-top: 15px;
            }
        }
        .page_button, .page_buttons {
            padding: 10px;
            margin: 5px;
            border: none;
            background-color: #ddd;
            cursor: pointer;
            border-radius: 5px;
        }
        .page_button.active {
            background-color: #275DAD;
            color: white;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    @auth
    <header>
        <div class="title">
            <a class="nav" href="{{ route('landing_page') }}"> 
                <img class="logo" src="./Images/LOGO V2 horizontal.png" alt="8-Bit Market Logo"/>
            </a>
        </div>
        <form  class="search_bar" action="{{ route('categorized_games') }}" method="GET">
            <input class="search" type="text" name="search" value="{{ request('search') }}" placeholder="Search games">
        </form>
        <div class="user_actions">
            <a class="nav open-logout" href="#">
                <img src="./Images/log-out-svgrepo-com.svg" alt="LogOut" class="icon"> 
            </a>
            <a class="action nav open-logout" href="#">Log Out</a>
            <a class="nav" href="{{ route('shopping_cart') }}">
                <img src="./Images/cart-shopping-svgrepo-com.svg" alt="Menu" class="icon">               
            </a>
            <a class="action nav" href="{{ route('shopping_cart') }}">Cart</a>
            <div class="menu">
                <img src="./Images/menu-svgrepo-com.svg" alt="Menu" class="icon">
            </div>
        </div>    
    </header>             
    @else
    <header>
        <div class="title">
            <a class="nav" href="{{ route('landing_page') }}"> 
                <img class="logo" src="./Images/LOGO V2 horizontal.png" alt="8-Bit Market Logo"/>
            </a>
        </div>
        <form  class="search_bar" action="{{ route('categorized_games') }}" method="GET">
            <input class="search" type="text" name="search" value="{{ request('search') }}" placeholder="Search games">
        </form>
        <div class="user_actions">
            <a href="{{ route('sign_in') }}">
                <img src="./Images/avatar-default-svgrepo-com.svg" alt="SignIn" class="icon"> 
            </a>
            <a class="action" href="{{ route('sign_in') }}">Sign In</a>
            <a class="nav" href="{{ route('shopping_cart') }}">
                <img src="./Images/cart-shopping-svgrepo-com.svg" alt="Menu" class="icon">               
            </a>
            <a class="action nav" href="{{ route('shopping_cart') }}">Cart</a>
            <div class="menu">
                <img src="./Images/menu-svgrepo-com.svg" alt="Menu" class="icon">
            </div>
        </div>       
    </header>
    @endauth
    <aside class="sidebar">
        <button class="close_btn">&times;</button> 
        <div>
            <input class="search" type="text" placeholder="Search">
            <div class="mobile_filters">
                <div class="order_by_mobile">
                    <label for="order_by">Order By</label>
                    <form method="GET" action="{{ route('categorized_games') }}">
                        <input type="hidden" name="platform" value="{{ request('platform') }}">
                        <input type="hidden" name="genre" value="{{ request('genre') }}">
                        <input type="hidden" name="category" value="{{ request('category') }}">
                        <input type="hidden" name="fromPrice" value="{{ request('fromPrice') }}">
                        <input type="hidden" name="toPrice" value="{{ request('toPrice') }}">
                        <select name="order_by" id="order_by" onchange="this.form.submit()">
                            <option value="">Choose an option</option>
                            <option value="price_increasing" {{ request('order_by') == 'price_increasing' ? 'selected' : '' }}>Price: from less to more</option>
                            <option value="price_decreasing" {{ request('order_by') == 'price_decreasing' ? 'selected' : '' }}>Price: from more to less</option>
                        </select>
                    </form>
                </div>
                <div>
                    <div>
                        <h3>Price range</h3>
                        <form method="GET" action="{{ route('categorized_games') }}">
                            <input type="hidden" name="category" value="{{ request('category') }}">
                            <input type="hidden" name="genre" value="{{ request('genre') }}">
                            <input type="hidden" name="platform" value="{{ request('platform') }}">
                            <input type="hidden" name="order_by" value="{{ request('order_by') }}">
                            <div class="price_range">
                                <label for="fromPrice">From</label>
                                <input type="number" id="fromPrice" name="fromPrice" min="0" max="1000" step="1" value="{{ request('fromPrice') }}">
                                <label for="toPrice">To</label>
                                <input type="number" id="toPrice" name="toPrice" min="0" max="500" step="1" value="{{ request('toPrice') }}"> 
                            </div>
                            <button type="submit" class="button_apply">Apply</button>
                        </form>
                        <button class="button_apply" disabled>Apply</button>
                    </div>
                    <div class="filter">
                        <label for="genre">Genre</label>
                        <form method="GET" action="{{ route('categorized_games') }}">
                            <input type="hidden" name="platform" value="{{ request('platform') }}">
                            <input type="hidden" name="order_by" value="{{ request('order_by') }}">
                            <input type="hidden" name="category" value="{{ request('category') }}">
                            <input type="hidden" name="fromPrice" value="{{ request('fromPrice') }}">
                            <input type="hidden" name="toPrice" value="{{ request('toPrice') }}">
                            <select name="genre" id="genre" onchange="this.form.submit()">
                                <option value="">Choose an option</option>
                                @foreach($genres as $genre)
                                    <option value="{{ $genre->genre }}" {{ request('genre') == $genre->genre ? 'selected' : '' }}>{{ ucfirst($genre->genre) }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>        
                    <div class="filter">
                        <label for="platform">Platform</label>
                        <form method="GET" action="{{ route('categorized_games') }}">
                            <input type="hidden" name="genre" value="{{ request('genre') }}">
                            <input type="hidden" name="order_by" value="{{ request('order_by') }}">
                            <input type="hidden" name="category" value="{{ request('category') }}">
                            <input type="hidden" name="fromPrice" value="{{ request('fromPrice') }}">
                            <input type="hidden" name="toPrice" value="{{ request('toPrice') }}">
                            <select name="platform" id="platform" onchange="this.form.submit()">
                                <option value="">Choose an option</option>
                                @foreach($platforms as $platform)
                                    <option value="{{ $platform->platform }}" {{ request('platform') == $platform->platform ? 'selected' : '' }}>{{ ucfirst($platform->platform) }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>          
                </div>
            </div>         
        </div>         
    </aside>
    <main>
        <div class="top_section">
            <div>
                <h2 id="category_name"></h2>
                <div class="articles_pills">
                    <p id="articles_count">{{ $totalGames }} articles</p>
                    <div class="applied_filters">
                        @if(request('fromPrice') && request('toPrice'))
                            <div class="filter_label">Price: {{ request('fromPrice') }} - {{ request('toPrice') }} €<span class="remove" data-filter="price">✖</span></div>
                        @endif
                        @if(request('genre'))
                            <div class="filter_label">Genre: {{ ucfirst(request('genre')) }}<span class="remove" data-filter="genre">✖</span></div>
                        @endif
                        @if(request('platform'))
                            <div class="filter_label">Platform: {{ ucfirst(request('platform')) }}<span class="remove" data-filter="platform">✖</span></div>
                        @endif
                    </div>
                </div>                
            </div>           
            <div class="order_by">
                <label for="order_by">Order By</label>
                <form method="GET" action="{{ route('categorized_games') }}">
                    <input type="hidden" name="platform" value="{{ request('platform') }}">
                    <input type="hidden" name="genre" value="{{ request('genre') }}">
                    <input type="hidden" name="category" value="{{ request('category') }}">
                    <input type="hidden" name="fromPrice" value="{{ request('fromPrice') }}">
                    <input type="hidden" name="toPrice" value="{{ request('toPrice') }}">
                    <select name="order_by" id="order_by" onchange="this.form.submit()">
                        <option value="">Choose an option</option>
                        <option value="price_increasing" {{ request('order_by') == 'price_increasing' ? 'selected' : '' }}>Price: from less to more</option>
                        <option value="price_decreasing" {{ request('order_by') == 'price_decreasing' ? 'selected' : '' }}>Price: from more to less</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="divider"></div>
        <div class="container">
            <div class="filters">
                <div>
                    <h3>Price range</h3>
                    <form method="GET" action="{{ route('categorized_games') }}">
                        <input type="hidden" name="category" value="{{ request('category') }}">
                        <input type="hidden" name="genre" value="{{ request('genre') }}">
                        <input type="hidden" name="platform" value="{{ request('platform') }}">
                        <input type="hidden" name="order_by" value="{{ request('order_by') }}">
                        <div class="price_range">
                            <label for="fromPrice">From</label>
                            <input type="number" id="fromPrice" name="fromPrice" min="0" max="1000" step="1" value="{{ request('fromPrice') }}">
                            <label for="toPrice">To</label>
                            <input type="number" id="toPrice" name="toPrice" min="0" max="500" step="1" value="{{ request('toPrice') }}"> 
                        </div>
                        <button type="submit" class="button_apply">Apply</button>
                    </form>
                </div>
                <div class="filter">
                    <label for="genre">Genre</label>
                    <form method="GET" action="{{ route('categorized_games') }}">
                        <input type="hidden" name="platform" value="{{ request('platform') }}">
                        <input type="hidden" name="order_by" value="{{ request('order_by') }}">
                        <input type="hidden" name="category" value="{{ request('category') }}">
                        <input type="hidden" name="fromPrice" value="{{ request('fromPrice') }}">
                        <input type="hidden" name="toPrice" value="{{ request('toPrice') }}">
                        <select name="genre" id="genre" onchange="this.form.submit()">
                            <option value="">Choose an option</option>
                            @foreach($genres as $genre)
                                <option value="{{ $genre->genre }}" {{ request('genre') == $genre->genre ? 'selected' : '' }}>{{ ucfirst($genre->genre) }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                
                <div class="filter">
                    <label for="platform">Platform</label>
                    <form method="GET" action="{{ route('categorized_games') }}">
                        <input type="hidden" name="genre" value="{{ request('genre') }}">
                        <input type="hidden" name="order_by" value="{{ request('order_by') }}">
                        <input type="hidden" name="category" value="{{ request('category') }}">
                        <input type="hidden" name="fromPrice" value="{{ request('fromPrice') }}">
                        <input type="hidden" name="toPrice" value="{{ request('toPrice') }}">
                        <select name="platform" id="platform" onchange="this.form.submit()">
                            <option value="">Choose an option</option>
                            @foreach($platforms as $platform)
                                <option value="{{ $platform->platform }}" {{ request('platform') == $platform->platform ? 'selected' : '' }}>{{ ucfirst($platform->platform) }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>         
            </div>
            <section class="games_section">
                <div class="games" id="gamesContainer"></div>   
                    @foreach ($games as $game)
                    <div class="game">
                        <div class="game_link" style="cursor: pointer;" onclick="location.href='{{ url('/game_details?name=' . urlencode($game->name)) }}'">
                            <!--<img class="image_game" src="{{ asset($game->image) }}" alt="{{ $game->name }}" />-->
                            <img class="image_game" src="./Images/Overwatch 2/Overwatch_2_Steam_artwork.jpg" alt="{{ $game->name }}" />
                        </div>
                        <div class="game_link" style="cursor: pointer;" onclick="location.href='{{ url('/game_details?name=' . urlencode($game->name)) }}'">
                            <p>{{ $game->title }}</p>
                        </div>
                        <div class="price_icon">
                            <p>{{ $game->price }} €</p>
                            <div class="heart">
                                <img src="{{ asset('Images/heart-svgrepo-com.svg') }}" alt="Heart" class="icon">
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>   
        </div> 
        <div class="pagination" class="pagination">
            {{ $games->links('vendor.pagination.custom') }}
        </div>
        <div id="logoutModal" class="modal">
            <div class="modal_content">
                <p>Are you sure you want to log out?</p>
                <form action="/log_out" method="POST">
                    @csrf
                    <button id="confirmLogout">Yes</button>
                </form>
                <button id="cancelLogout">No</button>
            </div>
        </div>
    </main>
    <footer>
        2025 © 8-Bit Market. All rights reserved. 🎮❤️
    </footer>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const updatePagination = () => {
            const pageButtons = document.querySelectorAll('.page_button');
            const screenWidth = window.innerWidth;
            const pageLinksContainer = document.getElementById('page_buttons');
            const currentPageContainer = document.getElementById('current_page');

            if (screenWidth < 600) {
                // Mostrar solo "Previous", página actual y "Next"
                currentPageContainer.style.display = 'inline-block'; // Mostrar la página actual
                pageLinksContainer.classList.add('hidden'); // Ocultar las páginas numeradas
                
                pageButtons.forEach(button => {
                    // Mostrar solo los botones relevantes
                    if (button.classList.contains('active') || button.innerText === "Previous" || button.innerText === "Next" || button === currentPageContainer) {
                        button.style.display = 'inline-block';
                    } else {
                        button.style.display = 'none';
                    }
                });
            } else {
                // Mostrar todas las páginas numeradas
                currentPageContainer.style.display = 'inline-block'; // Mostrar la página actual
                pageLinksContainer.classList.remove('hidden'); // Mostrar las páginas numeradas
                
                // Mostrar todos los botones
                pageButtons.forEach(button => {
                    button.style.display = 'inline-block';
                });
            }
        };

        // Llama a la función al cargar la página
        updatePagination();

        // Actualiza la paginación cuando se redimensione la ventana
        window.addEventListener('resize', updatePagination);
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const menuIcon = document.querySelector(".menu");
        const sidebar = document.querySelector(".sidebar");
        const closeButton = document.querySelector(".close_btn");

        menuIcon.addEventListener("click", function () {
            sidebar.classList.toggle("open");
        });

        closeButton.addEventListener("click", function () {
            sidebar.classList.remove("open");
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const removeButtons = document.querySelectorAll('.remove');

        removeButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const filterType = button.getAttribute('data-filter');

                let form;
                if (filterType === 'price') {
                    form = document.querySelector('form[action="{{ route('categorized_games') }}"]'); 
                    form.querySelector('[name="fromPrice"]').value = '';
                    form.querySelector('[name="toPrice"]').value = '';
                } else if (filterType === 'genre') {
                    form = document.querySelector('form[action="{{ route('categorized_games') }}"]'); 
                    form.querySelector('[name="genre"]').value = '';
                } else if (filterType === 'platform') {
                    form = document.querySelector('form[action="{{ route('categorized_games') }}"]');
                    form.querySelector('[name="platform"]').value = '';
                }

                form.submit();
            });
        });
    });
</script> 
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const heartIcons = document.querySelectorAll(".heart");
        const heartFilled = ` <img src="./Images/heart-svgrepo-com (1).svg" alt="Heart" class="heart icon">`;
        
        const heartOutline = `<img src="./Images/heart-svgrepo-com.svg" alt="Heart" class="heart icon">`;
        heartIcons.forEach(heart => {
            let isFavorite = false;
            heart.addEventListener("click", function() {
                isFavorite = !isFavorite;
                heart.innerHTML = isFavorite ? heartFilled : heartOutline;
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        function getCategoryFromURL() {
            const params = new URLSearchParams(window.location.search);
            return params.get('category'); 
        }

        const categoryName = getCategoryFromURL();
        
        const categoryElement = document.getElementById("category_name");
        categoryElement.textContent = categoryName;
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const logoutModal = document.getElementById("logoutModal");
        const confirmLogoutBtn = document.getElementById("confirmLogout");
        const cancelLogoutBtn = document.getElementById("cancelLogout");
        const logoutLinks = document.querySelectorAll(".open-logout");

        function openLogoutModal(event) {
            event.preventDefault();
            logoutModal.style.display = "flex";
        }

        logoutLinks.forEach(link => {
            link.addEventListener("click", openLogoutModal);
        });

        confirmLogoutBtn.addEventListener("click", function () {
            window.location.href = window.location.pathname; 
        });

        cancelLogoutBtn.addEventListener("click", function () {
            logoutModal.style.display = "none"; 
        });
    });
</script> 
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const urlParams = new URLSearchParams(window.location.search);
        const loginParam = urlParams.get("login");
        if (loginParam) {
            const navLinks = document.querySelectorAll('.nav');
            navLinks.forEach(link => {
                const currentHref = link.getAttribute('href');
                if (!currentHref.includes('login=')) {
                    link.setAttribute('href', `${currentHref}${currentHref.includes('?') ? '&' : '?'}login=${loginParam}`);
                }
            });
        }
    });
</script>
</html>
