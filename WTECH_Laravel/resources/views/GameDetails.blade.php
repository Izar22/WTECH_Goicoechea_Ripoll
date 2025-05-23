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
        main {
            background: #FBFFFE;
            margin-top: 70px;
            min-height: calc(100vh - 108.4px);
            margin-bottom: 35px;
            padding: 20px;
            box-sizing: border-box;
            @media (max-width: 768px) {
                height: auto;
                min-height: calc(100vh - 108.4px);
            }
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
            gap: 20px;;
            justify-content: space-around;
        }
        .game_name{
            display: flex;
            justify-content: space-between;
            flex-direction: row;
            align-items: center;
            margin: 0 9vw 0 5vw;
        }
        .game {
            width: auto;
            height: 400px;
            @media (max-width: 768px) {
                width: 100%;
                height: auto;
            }
        }
        * {box-sizing:border-box}

        .slideshow_container {
            max-width: 300px;
            position: relative;
            margin: auto;
        }
        .mySlides {
            display: none;
        }
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            margin-top: -22px;
            padding: 16px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }
        .prev:hover, .next:hover {
            background-color: rgba(0,0,0,0.8);
        }
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }
        .active, .dot:hover {
            background-color: #275DAD;
        }
        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }
        @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }
        .game_details{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            gap: 30px;
            @media (max-width: 768px) {
                gap: 10px; 
            }
        }
        .details {
            margin-top: 10px;
            width: 25vw;
            @media (max-width: 768px) {
                width: 100%;  
                padding: 5px;
            }
        }
        .details input{
            font-family: "Kanit", sans-serif;
            width: 100%;
            border: 1px solid #ccc;
            padding: 5px;
            font-size: 16px;
            @media (max-width: 768px) {
                width: 99%;  
            }
        }
        .details textarea {
            font-family: "Kanit", sans-serif;
            width: 100%;
            max-width:100%;
            border: 1px solid #ccc;
            padding: 5px;
            font-size: 16px;
            @media (max-width: 768px) {
                width: 99%;  
                min-height: 200px;
            }
        }
        .price_box { 
            padding: 20px;
            border: 1px solid black;
            border-radius: 12px;
            background-color: white;
            text-align: center;
            min-width: 300px;
            max-height: 300px;
            @media (max-width: 768px) {
                width: 100%;
            }
        }
        .price_box input {
            font-family: "Kanit", sans-serif;
            width: 100px;
            font-size: 18px;
            text-align: center;
        }  
        .button {
            font-family: "Kanit", sans-serif;
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            background-color: #275DAD;
            border: none;
            cursor: pointer;
            border-radius: 12px;
            color: #ffffff
        }
        .button:hover{
            background-color: #7ca6e4;
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
        .heart {
            cursor: pointer;
        }
        .price{
            margin-top: 10px;
        }
        .back{
            display: flex;
            align-items: center;
            font-size: 20px;
            margin-left: 10px;
            cursor: pointer;
            text-decoration: none;
            color: black;
        }
        .back p{
            margin: 0;
            margin-left: 5px;
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
        .icon{
            width: 24px;
            height: 24px;
        }
        .input-group{
            margin: 16px 0;
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
                <img src="{{ asset('Images/log-out-svgrepo-com.svg') }}" alt="LogOut" class="icon"> 
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
    </aside>
    <main>
        <a href="{{ url()->previous() }}" class="back">
            <img src="{{ asset('./Images/arrow-narrow-left-svgrepo-com.svg') }}" alt="Arrow" class="icon">
            <p>Back</p>
        </a>

        <div class="game_name">
            <h2 id="game_name">{{ $game->title }}</h2>
            <div id="heartIcon" class="heart">
                <img src="{{ asset('./Images/heart-svgrepo-com.svg') }}"  alt="Heart" class="icon">
            </div>
        </div>
        <div class="container">
            <div class="game_details">
                <div class="slideshow_container">

                    @foreach ($game->images as $index => $image)
                        <div class="mySlides fade">
                            <div class="numbertext">{{ $index + 1 }} / {{ $game->images->count() }}</div>
                            <img src="{{ asset($image->path) }}" alt="Game Image {{ $index + 1 }}" style="width:100%;">
                        </div>
                    @endforeach
                
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                
                    <div style="text-align:center">
                        @foreach ($game->images as $index => $image)
                            <span class="dot" onclick="currentSlide({{ $index + 1 }})"></span>
                        @endforeach
                    </div>
                </div>

                <div class="details">
                    <div class="input-group">
                        <p><strong>Publisher:</strong> <span>{{ $game->publisher_name }}</span></p>
                    </div>
                    <div class="input-group">
                        <p><strong>Platform:</strong> <span>{{ $game->platform }}</span></p>
                    </div>
                    <div class="input-group">
                        <p><strong>Region:</strong> <span>{{ $game->region }}</span></p>
                    </div>
                    <div class="input-group">
                        <p><strong>Genre:</strong> <span>{{ $game->genre }}</span></p>
                    </div>
                    <div class="input-group">
                        <p><strong>Category:</strong> <span>{{ $game->category }}</span></p>
                    </div>
                    <div class="input-group">
                        <p><strong>Date of release:</strong> <span>{{ $game->release_date }}</span></p>
                    </div>
                    <div class="input-group">
                        <p><strong>Description:</strong> <span>{{ $game->description }}</span></p>
                    </div>
                </div>
            </div>
            <div class="price_box">
                <h3 class="price">Price</h3>
                <p><strong>{{ $game->price }} €</strong></p>
                <form action="{{ route('shopping_cart_post') }}" method="POST">
                    @csrf
                    <input type="number" name="quantity" id="quantity" min="1" value="1">        
                    <input type="hidden" name="game_id" value="{{ $game->id }}">  
                    <button type="submit" class="button">Add to cart</button>
                </form>
                <form action="{{ route('shopping_cart_now') }}" method="POST">
                    @csrf  
                    <input type="hidden" name="game_id" value="{{ $game->id }}">
                    <input type="hidden" name="quantity" id="buy-now-quantity" value="1">
                    <button type="submit" class="button">Buy now</button>
                </form>
            </div>
        </div>
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
    document.addEventListener('DOMContentLoaded', function () {
        const quantityInput = document.getElementById('quantity');
        const buyNowQuantityInput = document.getElementById('buy-now-quantity');

        quantityInput.addEventListener('input', function () {
            buyNowQuantityInput.value = quantityInput.value;
        });
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
        const heartIcon = document.getElementById("heartIcon");
        let isFavorite = false;
        
        const heartFilled = `<img src="{{ asset('Images/heart-svgrepo-com (1).svg') }}" alt="Heart" class="icon">`;
        
        const heartOutline = `<img src="{{ asset('Images/heart-svgrepo-com.svg') }}" alt="Heart" class="icon">`;
        
        heartIcon.addEventListener("click", function () {
            isFavorite = !isFavorite;
            heartIcon.innerHTML = isFavorite ? heartFilled : heartOutline;
        });
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
    function customBack() {
        const previousPage = document.referrer;
        const currentPage = window.location.href;

        if (!previousPage || previousPage.includes("LoginPage.html") || previousPage === currentPage) {
            window.location.href = "LandingPage.html";  
        } else {
            window.location.href = previousPage;
        }
    }
</script>
<script>
    function customBackCart() {
        const urlParams = new URLSearchParams(window.location.search);
        const loginParam = urlParams.get("login");  

        if (loginParam){
            window.location.href = "ShoppingCart.html?login=valid";
        }
        else{
            window.location.href = "ShoppingCart.html";
        }
    } 
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
<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    }
</script>
</html>
