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
            height: calc(100vh - 108.4px);
            margin-bottom: 35px;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
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
        .selector_page{
            display: flex;
            flex-direction: row;
            justify-content: center;
            margin-top: 20px;
        }
        .circle{
            width: 35px;
            height: 35px;
            border: #000000 solid 2px;
            border-radius: 50px;
            padding-top: 10px;
            padding-left: 10px;
            cursor: pointer;
        }
        .circle.selected{
            background-color: #F5B841;
        }
        .divider{
            width: 75px;
            height: 2px;
            background-color: #000000;
            margin: 23px 0;
        }
        .game{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            gap: 20px;
            border: #000000 solid 1px;
            max-width: 100%;
            padding: 10px;
        }
        .img_game{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            gap: 30px;
        }
        .less_more{
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;
        }
        .less_more p{
            border:  #000000 solid 1px;
            width: 30px;
            height: 40px;
            align-items: center;
            padding-left: 20px;
            padding-top: 10px;
            background-color: #F5B841;
        }
        .image_game{
            width: 120px;
            height: auto;
        }
        .number_game{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .number_game p{
            margin: 0;
        }
        .price_game{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: end;
        }
        .price_game p{
            margin: 0;
        }
        .button{
            border: #000000 solid 1px;
            border-radius: 50px;
            width: 30px;
            height: 30px;
        }

        .left_section_cart{
            max-height: calc(100vh - 108.4px - 120px);
            width: 50vw;
            @media (max-width: 768px) {
                max-height: calc(65vh - 108.4px - 120px);
                width: 100%;
                padding: 10px;
            }
        }
        .left_section{
            max-height: calc(100vh - 108.4px - 120px);
            width: 50vw;
            @media (max-width: 768px) {
                width: 100%;
                padding: 10px;
            }
        }
        .games{
            max-height: calc(100vh - 108.4px - 180px); 
            display: flex;
            flex-direction: column;
            gap: 10px;
            overflow-y: auto;
            @media (max-width: 768px) {
                max-height: calc(65vh - 108.4px - 180px); 
            }
        }
        .container_cart, .container_payment, .container_shipping{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10vw;
            @media (max-width: 768px) {
                gap: 10px;
            }
        }
        .right_section{
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 30vw;
            @media (max-width: 768px) {
                width: 100%;
                padding: 10px;
            }
        }
        .total_price_title{
            align-self: start;
        }
        .total_price_title_small{
            align-self: start;
            font-size: 20px;
            
        }
        .total_price_cart{
            font-size: 24px;
            background-color: #F5B841;
            padding: 10px;
            border-radius: 12px;
            border: solid 1px black;
        }
        .total_price_shipping{
            font-size: 24px;
            background-color: #F5B841;
            padding: 10px;
            border-radius: 12px;
            border: solid 1px black;
            margin: 0;
        }
        .total_price_shipping_small{
            font-size: 16px;
            background-color: #F5B841;
            padding: 10px;
            border-radius: 12px;
            border: solid 1px black;
            margin: 0;
        }
        .total_price_cart_small{
            font-size: 16px;
            background-color: #F5B841;
            padding: 10px;
            border-radius: 12px;
            border: solid 1px black;
            margin: 0;
        }
        .total_price_button{
            margin-top: 20px;
        }
        .right_section button{
            font-size: 20px;
            font-family: "Kanit", sans-serif;
            background-color: #275DAD;
            padding: 10px;
            border-radius: 12px;
            margin-bottom: 10px;
            width: 100%;
            border: solid 1px black;
        }
        .right_section button:hover{
            background-color: #7ca6e4;
        }
        .delete_button{
            width: 24px;
            height: 24px;
            cursor: pointer;
        }
        .container_shipping, .container_payment, .container_cart {
            display: none; 
        }
        .container_shipping.visible, .container_payment.visible, .container_cart.visible {
            display: flex; 
        }
        .section_title {
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
            align-items: center;
        }
        .form_group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            gap: 15px;
        }
        .form_group input {
            font-family: "Kanit", sans-serif;
            box-sizing: border-box;
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .double_width {
            margin-bottom: 15px;
        }
        .double_width input {
            box-sizing: border-box;
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .summary {
            margin-top: 20px;
        }
        .summary div {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        .button_container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .modal {
            display: none; 
            position: fixed;
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); 
            overflow: auto;
        }
        .modal_content {
            background-color: white;
            padding: 20px;
            padding-top: 5%;
            margin: 30vh auto;
            width: 40%;
            height: 30%;
            border-radius: 8px;
            text-align: center;
            @media (max-width: 768px) {
                margin: 25vh auto;
                height: auto;
            }
        }
        .modal_content button{
            font-size: 20px;
            font-family: "Kanit", sans-serif;
            background-color: #275DAD;
            padding: 10px;
            border-radius: 12px;
            margin-bottom: 10px;
            width: 100%;
            border: solid 1px black;
        }
        .modal_content button:hover{
            background-color: #7ca6e4;
        }
        .modal_logOut {
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
        .modal_content_logOut {
            background: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }
        .modal_logOut button {
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
                <img class="logo" src="./Images/LOGO V2 horizontal.png" alt="8-Bit Market Logo"/>
            </a>
        </div>
        <form id="searchForm" class="search_bar" action="{{ route('categorized_games') }}" method="GET">
            <input type="hidden" id="categoryInput" name="category" value="{{ request('search') }}">
            <input class="search" id="searchInput" type="text" name="search" value="{{ request('search') }}" placeholder="Search games">
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
        <form id="searchForm" class="search_bar" action="{{ route('categorized_games') }}" method="GET">
            <input type="hidden" id="categoryInput" name="category" value="{{ request('search') }}">
            <input class="search" id="searchInput" type="text" name="search" value="{{ request('search') }}" placeholder="Search games">
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
            <form id="searchForm2" class="search" action="{{ route('categorized_games') }}" method="GET">
                <input type="hidden" id="categoryInput2" name="category" value="{{ request('search') }}">
                <input class="search" id="searchInput2" type="text" name="search" value="{{ request('search') }}" placeholder="Search games">
            </form>
        </div>         
    </aside>
    <main>
        <div class="selector_page">
            <div class="circle selected">
                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.29977 5H21L19 12H7.37671M20 16H8L6 3H3M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="divider"></div>
            <div class="circle">
                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17 10C17 11.7279 15.0424 14.9907 13.577 17.3543C12.8967 18.4514 12.5566 19 12 19C11.4434 19 11.1033 18.4514 10.423 17.3543C8.95763 14.9907 7 11.7279 7 10C7 7.23858 9.23858 5 12 5C14.7614 5 17 7.23858 17 10Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.5 10C14.5 11.3807 13.3807 12.5 12 12.5C10.6193 12.5 9.5 11.3807 9.5 10C9.5 8.61929 10.6193 7.5 12 7.5C13.3807 7.5 14.5 8.61929 14.5 10Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>             
            </div>
            <div class="divider"></div>
            <div class="circle">
                <svg width="24px" height="24px" viewBox="-0.5 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22 9.96997H2" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M5 18.9199H11" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M18 3.91992H6C3.79086 3.91992 2 5.71078 2 7.91992V17.9199C2 20.1291 3.79086 21.9199 6 21.9199H18C20.2091 21.9199 22 20.1291 22 17.9199V7.91992C22 5.71078 20.2091 3.91992 18 3.91992Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
        <section class="container_cart">
            <div class="left_section_cart">
                <h2>Shopping Cart</h2>
                <div class="games">
                    @php
                        $total = 0;
                        foreach ($items as $item) {
                            $total += $item->quantity * $item->game->price;
                        }
                        $shippingPrice = $total * 0.10;
                        $totalPrice = $total + $shippingPrice;
                    @endphp
                    @foreach ($items as $item)
                        <div class="game">
                            <div class="img_game">
                                @if ($item->game->images->isNotEmpty())
                                    <img class="image_game" src="{{ asset($item->game->images->first()->path) }}" alt="{{ $item->game->images->first()->path }}" />
                                @else
                                    <img class="image_game" src="./Images/Overwatch 2/Overwatch_2_Steam_artwork.jpg" alt="Imagen por defecto" />
                                @endif
                                <div class="number_game">
                                    <p>{{ $item->game->title }}</p>
                                    <div class="less_more" data-item-id="{{ $item->id }}">
                                        <button class="button button-less">-</button>
                                        <p class="quantity-display">{{ $item->quantity }}</p>
                                        <button class="button button-more">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="price_game" data-item-id="{{ $item->id }}" data-unit-price="{{ $item->game->price }}">
                                <form action="{{ route('cart_delete', $item->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    <button type="submit" class="delete_button" style="background: none; border: none; padding: 0;">
                                        <img src="./Images/trash-svgrepo-com.svg" alt="Delete"  class="delete_button">
                                    </button>
                                </form>
                                <p class="total-price">{{ number_format($item->quantity * $item->game->price, 2) }}€</p>
                            </div>
                        </div>
                    @endforeach    
                </div>
            </div>
            <div class="right_section">
                <h2 class="total_price_title">Order Price:</h2>
                <p class="total_price_cart">{{ number_format($total, 2) }} €</p>
                <button id="continue_shipping">Continue to shipping</button>
                <button onclick="customBack(); return false;">Keep shopping</button>
            </div>
        </section>
        <section class="container_shipping">
            <div class="left_section">
                <div class="section_title">Contact Information</div>
                <div class="form_group">
                    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
                    <input type="text" name="surname" placeholder="Surname" value="{{ old('surname') }}">
                </div>
                <div class="form_group">
                    <input type="email" name="email" placeholder="E-mail address" value="{{ old('email') }}">
                    <input type="text" name="phone" placeholder="Phone number" value="{{ old('phone') }}">
                </div>
    
                <div class="section_title">Shipping</div>
                <div class="double_width">
                    <input type="text" name="address" placeholder="Address" value="{{ old('address') }}">
                </div>
                <div class="form_group">
                    <input type="text" name="city" placeholder="City" value="{{ old('city') }}">
                    <input type="text" name="region" placeholder="Region" value="{{ old('region') }}">
                </div>
                <div class="form_group">
                    <input type="text" name="country" placeholder="Country" value="{{ old('country') }}">
                    <input type="text" name="zip" placeholder="Zip Code" value="{{ old('zip') }}">
                </div>
            </div>
    
            <div class="right_section">
                <h2 class="total_price_title_small">Order Price:</h2>
                <p class="total_price_cart_small">{{ number_format($total, 2) }} €</p>
    
                <h2 class="total_price_title_small">Shipping:</h2>
                <p class="total_price_shipping_small shipping_price" data-shipping="{{ $shippingPrice }}">
                    {{ number_format($shippingPrice, 2) }} €
                </p>
                <h2 class="total_price_title">Total price:</h2>
                <p class="total_price_shipping">{{ number_format($totalPrice, 2) }} €</p>
    
                <button type="submit" class="total_price_button" id="continue_payment">Continue to payment</button>
            </div>
        </section>

        <section class="container_payment" >
            <div class="left_section">
                <div class="section_title">Payment Details</div>
                <div class="double_width">
                    <input type="text" placeholder="Cardholder Name">
                </div>
                <div class="double_width">
                    <input type="text" placeholder="Card Number">
                </div>
                <div class="form_group">
                    <input type="text" placeholder="Expiration Date (MM/YY)">
                    <input type="text" placeholder="CVV">
                </div>
            </div>
            <div class="right_section">
                <h2 class="total_price_title_small">Order Price:</h2>
                <p class="total_price_cart_small">{{ number_format($total, 2) }} €</p>
                <h2 class="total_price_title_small">Shipping:</h2>
                <p class="total_price_shipping_small">{{ number_format($shippingPrice, 2) }} €</p>
                <h2 class="total_price_title">Total price:</h2>
                <p class="total_price_shipping">{{ number_format($totalPrice, 2) }} €</p>
                <button class="total_price_button" id="finish_payment">Complete payment</button>
            </div>
            
        </section>
        <div id="paymentModal" class="modal">
            <div class="modal_content">
                <h2>Thanks for ordering with us!</h2>
                <p>Your payment was successfully processed</p>
                <a class="nav" href="LandingPage.html">
                    <button>Back to homepage</button>
                </a>
            </div>
        </div>
        <div id="logoutModal" class="modal_logOut">
            <div class="modal_content_logOut">
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
    document.querySelectorAll('.less_more').forEach(container => {
        const itemId = container.dataset.itemId;
        const lessBtn = container.querySelector('.button-less');
        const moreBtn = container.querySelector('.button-more');
        const quantityDisplay = container.querySelector('.quantity-display');
    
        const priceContainer = document.querySelector(`.price_game[data-item-id="${itemId}"]`);
        const totalPriceEl = priceContainer.querySelector('.total-price');
    
        const updateQuantity = (action) => {
            fetch("{{ route('cart_updateQuantity') }}", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    item_id: itemId,
                    action: action
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    quantityDisplay.textContent = data.new_quantity;
                    totalPriceEl.textContent = data.total_price + '€';

                    let totalCart = 0;
                    document.querySelectorAll('.total-price').forEach(el => {
                        const price = parseFloat(el.textContent.replace('€', '')) || 0;
                        totalCart += price;
                    });
                    document.querySelector('.total_price_cart').textContent = totalCart.toFixed(2) + ' €';
                    document.querySelectorAll('.total_price_cart_small').forEach(el => {
                        el.textContent = totalCart.toFixed(2) + ' €';
                    });

                    const shipping = totalCart * 0.10;

                    document.querySelectorAll('.shipping_price').forEach(el => {
                        el.textContent = shipping.toFixed(2) + ' €';
                        el.dataset.shipping = shipping.toFixed(2); 
                    });

                    const fullTotal = totalCart + shipping;
                    document.querySelectorAll('.total_price_shipping').forEach(el => {
                        el.textContent = fullTotal.toFixed(2) + ' €';
                    });
                } else {
                    alert('Ocurrió un error al actualizar el carrito');
                }
            });
        };
    
        lessBtn.addEventListener('click', () => updateQuantity('decrease'));
        moreBtn.addEventListener('click', () => updateQuantity('increase'));
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const containers = document.querySelectorAll(".container_cart, .container_shipping, .container_payment");
        containers[0].classList.add("visible"); 
    });

    document.addEventListener("DOMContentLoaded", () => {
        const continueToShippingButton = document.querySelector("#continue_shipping");
        const continueToPaymentButton = document.querySelector("#continue_payment");
        const containers = document.querySelectorAll(".container_cart, .container_shipping, .container_payment");
        const circles = document.querySelectorAll(".circle");

        continueToShippingButton.addEventListener("click", () => {
            containers.forEach(container => container.classList.remove("visible"));
            document.querySelector(".container_shipping").classList.add("visible");
            circles.forEach(c => c.classList.remove("selected"));
            circles[1].classList.add("selected");
        });

        continueToPaymentButton.addEventListener("click", () => {
            containers.forEach(container => container.classList.remove("visible"));
            document.querySelector(".container_payment").classList.add("visible");
            circles.forEach(c => c.classList.remove("selected"));
            circles[2].classList.add("selected");
        });
    });

    document.addEventListener("DOMContentLoaded", () => {
    const circles = document.querySelectorAll(".circle");
    const containers = document.querySelectorAll(".container_cart, .container_shipping, .container_payment");

    function changeContainer(selectedIndex) {
        containers.forEach(container => container.classList.remove("visible"));

        if (selectedIndex >= 0 && selectedIndex < containers.length) {
            containers[selectedIndex].classList.add("visible");
        }
    }

    circles.forEach((circle, index) => {
        circle.addEventListener("click", () => {
            circles.forEach(c => c.classList.remove("selected"));
            circle.classList.add("selected");

            changeContainer(index);
        });
    });
});
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const completePaymentButton = document.querySelector("#finish_payment"); 
    const modal = document.getElementById("paymentModal"); 

    completePaymentButton.addEventListener("click", function () {
        modal.style.display = "block";
    });
});
</script>
<script>
    function customBack() {
        window.location.href = "{{ url()->previous() }}";
    }
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
</html>
