<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>8-Bit Market</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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
            z-index: 100;
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
                width: 60vw;
                padding-left: 10vw;
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
        .navegation {
            display: flex;
            background: #F5B841;
            border-top: #000000 solid 1px;
            padding: 10px;
            justify-content: space-around;
            @media (max-width: 768px) {
                display: none;
            }
        }
        .navegation a {
            margin-right: 15px;
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
        .banner {
            background-image: url('{{ asset('./Images/preview.jpg') }}');
            background-size: cover; 
            background-position: center;
            background-color: rgba(39, 93, 173, 0.6); 
            background-blend-mode: overlay;
            color: white;
            text-align: center;
            padding: 50px 15px;
        }
        .CTA_first{
            font-size: 64px;
            margin: 0;
            @media (max-width: 768px) {
                font-size: 32px;
            }
        }
        .CTA_second{
            font-size: 96px;
            margin: -50px 0 -20px;
            @media (max-width: 768px) {
                font-size: 64px;
                margin: -30px 0 -20px;
            }
        }
        .CTA_third{
            font-size: 32px;
            margin-bottom: 0;
            @media (max-width: 768px) {
                font-size: 24px;
            }
        }
        main {
            background: #FBFFFE;
            margin-top: 70px;
            height: auto;
            min-height: calc(100vh - 108.4px);
            margin-bottom: 35px;
            box-sizing: border-box;
            @media (max-width: 768px) {
                height: auto;
                min-height: calc(100vh - 105px);
            }
        }
        .image_game{
            width: 120px;
            height: 180px;
        }
        .game_list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }
        .section_title{
            padding: 10px 5vw 0;
            font-size: 24px;
            @media (max-width: 768px) {
                padding-left: 20px;
            }
        }
        article {
            width: 170px;
            height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: start;
        }
        .game{
            width: 170px;
            height: 250px;
        }
        .game_name{
            font-size: 20px;
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
        .navegation_mobile{
            display: flex;
            flex-direction: column;
        }
        .navegation_mobile a{
            text-decoration: none;
            padding-left: 10vw;
            color: black;
        }
        .swiper {
            width: 90%;
            padding: 20px;
        }
        .swiper-wrapper {
            display: flex;
            align-items: center;
        }
        .swiper-slide {
            width: 170px;
            display: flex;
            flex-direction: column;
            align-items: center;
           
        }
        .swiper-slide a{
            text-decoration: none;
        }
        .game {
            width: 170px;
            height: 250px;
            object-fit: cover;
        }
        .game_name {
            font-size: 20px;
            text-align: center;
            color: black;
            margin-top: 5px;
            text-overflow: ellipsis;
            overflow: hidden;
            width: 100%;
            max-width: 170px;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
           
        }
        .swiper-button-next,
        .swiper-button-prev {
            color: black;
            padding: 10px;
        }
        .title{
            display: flex;
            flex-direction: row;
        }
        .logo{
            height: 70px;
            width: auto;
        }
        .icon{
            width: 24px;
            height: 24px;
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
        .form_logout{
            display: inline-flex;
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
    </style>
</head>
<body>
    @auth
    <header>
        <div class="title">
            <a class="nav" href="{{ route('landing_page') }}"> 
                <img class="logo" src="{{ asset('./Images/LOGO V2 horizontal.png') }}" alt="8-Bit Market Logo"/>
            </a>
        </div>
        <form id="searchForm" class="search_bar" action="{{ route('categorized_games') }}" method="GET">
            <input type="hidden" id="categoryInput" name="category" value="{{ request('search') }}">
            <input class="search" id="searchInput" type="text" name="search" value="{{ request('search') }}" placeholder="Search games">
        </form>
        <div class="user_actions">
            <a class="nav open-logout" href="#">
                <img src="{{ asset('./Images/log-out-svgrepo-com.svg') }}" alt="LogOut" class="icon"> 
            </a>
            <a class="action nav open-logout" href="#">Log Out</a>
            <a class="nav" href="{{ route('shopping_cart') }}">
                <img src="{{ asset('./Images/cart-shopping-svgrepo-com.svg') }}" alt="Menu" class="icon">               
            </a>
            <a class="action nav" href="{{ route('shopping_cart') }}">Cart</a>
            <div class="menu">
                <img src="{{ asset('./Images/menu-svgrepo-com.svg') }}" alt="Menu" class="icon">
            </div>
        </div>    
    </header>             
    @else
    <header>
        <div class="title">
            <a class="nav" href="{{ route('landing_page') }}"> 
                <img class="logo" src="{{ asset('./Images/LOGO V2 horizontal.png') }}" alt="8-Bit Market Logo"/>
            </a>
        </div>
        <form id="searchForm" class="search_bar" action="{{ route('categorized_games') }}" method="GET">
            <input type="hidden" id="categoryInput" name="category" value="{{ request('search') }}">
            <input class="search" id="searchInput" type="text" name="search" value="{{ request('search') }}" placeholder="Search games">
        </form>
        <div class="user_actions">
            <a href="{{ route('sign_in') }}">
                <img src="{{ asset('./Images/avatar-default-svgrepo-com.svg') }}" alt="SignIn" class="icon"> 
            </a>
            <a class="action" href="{{ route('sign_in') }}">Sign In</a>
            <a class="nav" href="{{ route('shopping_cart') }}">
                <img src="{{ asset('./Images/cart-shopping-svgrepo-com.svg') }}" alt="Menu" class="icon">               
            </a>
            <a class="action nav" href="{{ route('shopping_cart') }}">Cart</a>
            <div class="menu">
                <img src="{{ asset('./Images/menu-svgrepo-com.svg') }}" alt="Menu" class="icon">
            </div>
        </div>
    </header>
    @endauth
    <aside class="sidebar">
        <button class="close_btn">&times;</button> 
        <div>
            <form id="searchForm2" class="search" action="{{ route('categorized_games') }}" method="GET">
                <input type="hidden" id="categoryInput2" name="category" value="{{ request('search') }}">
                <input class="search" id="searchInput2" type="text" name="search" value="{{ request('search') }}" placeholder="Search games">
            </form>
        </div>   
        <nav class="navegation_mobile">
            <a class="nav" href="{{ route('categorized_games', ['category' => 'All games']) }}">All games</a>
            <a class="nav" href="{{ route('categorized_games', ['category' => 'Short games']) }}">Short games</a>
            <a class="nav" href="{{ route('categorized_games', ['category' => 'Long games']) }}">Long games</a>
            <a class="nav" href="{{ route('categorized_games', ['category' => 'Open world']) }}">Open world</a>
            <a class="nav" href="{{ route('categorized_games', ['category' => 'Pixel art']) }}">Pixel art</a>
        </nav>
        
    </aside>
    <main>
        <nav class="navegation">
            <a class="nav" href="{{ route('categorized_games', ['category' => 'All games']) }}">All games</a>
            <a class="nav" href="{{ route('categorized_games', ['category' => 'Short games']) }}">Short games</a>
            <a class="nav" href="{{ route('categorized_games', ['category' => 'Long games']) }}">Long games</a>
            <a class="nav" href="{{ route('categorized_games', ['category' => 'Open world']) }}">Open world</a>
            <a class="nav" href="{{ route('categorized_games', ['category' => 'Pixel art']) }}">Pixel art</a>
        </nav>
        <section class="banner">
            <h2 class="CTA_first">Play More,</h2>
            <h2 class="CTA_second">Pay Less!</h2>
            <p class="CTA_third">Find the Best Games at the Best Prices</p>
        </section>       
        <h3 class="section_title">Our recommendations</h3>
        <section class="swiper">
            <div class="swiper-wrapper" id="swiper-wrapper">
                @foreach ($games_recomended as $game)
                    <div class="swiper-slide">
                        <a class="nav" href="{{ url('/game_details', ['id' => $game->id]) }}">
                            @if ($game->images->isNotEmpty())
                                <img class="game" src="{{ asset($game->images->first()->path) }}" alt="{{ $game->images->first()->path }}" />
                            @else
                                <img class="game" src="{{ asset('./Images/Overwatch 2/Overwatch_2_Steam_artwork.jpg') }}" alt="Imagen por defecto" />
                            @endif
                            <h4 class="game_name">{{ $game->title }}</h4>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </section>
        <h3 class="section_title">Most Popular</h3>
        <section class="swiper swiper-container-2">
            <div class="swiper-wrapper" id="swiper-wrapper-2">
                @foreach ($games_popular as $game)
                    <div class="swiper-slide">
                        <a class="nav" href="{{ url('/game_details', ['id' => $game->id]) }}">
                            @if ($game->images->isNotEmpty())
                                <img class="game" src="{{ asset($game->images->first()->path) }}" alt="{{ $game->images->first()->path }}" />
                            @else
                                <img class="game" src="{{ asset('./Images/Overwatch 2/Overwatch_2_Steam_artwork.jpg') }}" alt="Imagen por defecto" />
                            @endif
                            <h4 class="game_name">{{ $game->title }}</h4>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </section>
        <div id="logoutModal" class="modal">
            <div class="modal_content">
                <p>Are you sure you want to log out?</p>
                <form action="/log_out" method="POST" class="form_logout">
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
    document.getElementById('searchForm').addEventListener('submit', function (e) {
        const searchValue = document.getElementById('searchInput').value;
        document.getElementById('categoryInput').value = 'Searching for: ' + searchValue;
    });
</script>
<script>
    document.getElementById('searchForm2').addEventListener('submit', function (e) {
        const searchValue = document.getElementById('searchInput2').value;
        document.getElementById('categoryInput2').value = 'Searching for: ' + searchValue;
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
    document.addEventListener("DOMContentLoaded", function () {
        new Swiper('.swiper', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        new Swiper('.swiper-container-2', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        new Swiper(".swiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            breakpoints: {
                532: { slidesPerView: 1 },
                768: { slidesPerView: 2 },
                900: { slidesPerView: 3 },
                1024: { slidesPerView: 5 }
            }
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
