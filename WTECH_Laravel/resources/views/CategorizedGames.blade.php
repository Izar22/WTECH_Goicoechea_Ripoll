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
                max-height: calc(100vh - 108.4px);
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
            margin-top: 20px;
        }
        .page_button {
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
        <form class="search_bar" action="#" method="GET">
            <input class="search" type="text" placeholder="Search">
        </form>
        <div class="user_actions">
            <a class="nav open-logout" href="#">
                <img src="./Images/log-out-svgrepo-com.svg" alt="LogOut" class="icon"> 
            </a>
            <a class="action nav open-logout" href="#">Log Out</a>
            <a class="nav" href="ShoppingCart.html">
                <img src="./Images/cart-shopping-svgrepo-com.svg" alt="Menu" class="icon">               
            </a>
            <a class="action nav" href="ShoppingCart.html">Cart</a>
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
        <form class="search_bar" action="#" method="GET">
            <input class="search" type="text" placeholder="Search">
        </form>
        <div class="user_actions">
            <a href="{{ route('sign_in') }}">
                <img src="./Images/avatar-default-svgrepo-com.svg" alt="SignIn" class="icon"> 
            </a>
            <a class="action" href="{{ route('sign_in') }}">Sign In</a>
            <a class="nav" href="ShoppingCart.html">
                <img src="./Images/cart-shopping-svgrepo-com.svg" alt="Menu" class="icon">               
            </a>
            <a class="action nav" href="ShoppingCart.html">Cart</a>
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
                    <select name="order_by" id="order_by">
                        <option value="">Choose an option</option>
                        <option value="price_increasing">Price: from less to more</option>
                        <option value="price_decreasing">Price: from more to less</option>
                    </select>
                </div>
                <div>
                    <div>
                        <h3>Price range</h3>
                        <div class="price_range">
                            <label for="fromPrice">From</label>
                            <input type="number" id="fromPrice" name="fromPrice" min="0" max="1000" step="1">
                            <label for="toPrice">To</label>
                            <input type="number" id="toPrice" name="toPrice" min="0" max="500" step="1">
                        </div>
                        <button class="button_apply" disabled>Apply</button>
                    </div>
                    <div class="filter">
                        <label for="genre">Genre</label>
                        <select name="genre" id="genre">
                            <option value="">Choose an option</option>
                            <option value="action">Action</option>
                            <option value="adventure">Adventure</option>
                            <option value="rpg">RPG</option>
                            <option value="shooter">Shooter</option>
                            <option value="strategy">Strategy</option>
                            <option value="sports">Sports</option>
                            <option value="racing">Racing</option>
                            <option value="simulation">Simulation</option>
                            <option value="horror">Horror</option>
                            <option value="platformer">Platformer</option>
                            <option value="puzzle">Puzzle</option>
                        </select>
                    </div>        
                    <div class="filter">
                        <label for="platform">Platform</label>
                        <select name="platform" id="platform">
                            <option value="">Choose an option</option>
                            <option value="pc">PC</option>
                            <option value="ps5">PlayStation 5</option>
                            <option value="ps4">PlayStation 4</option>
                            <option value="xbox_series">Xbox Series X|S</option>
                            <option value="xbox_one">Xbox One</option>
                            <option value="switch">Nintendo Switch</option>
                            <option value="mobile">Mobile</option>
                        </select>
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
                    <p id="articles_count">XXXX articles</p>
                    <div class="applied_filters"></div>
                </div>                
            </div>           
            <div class="order_by">
                <label for="order_by">Order By</label>
                <select name="order_by" id="order_by">
                    <option value="">Choose an option</option>
                    <option value="price_increasing">Price: from less to more</option>
                    <option value="price_decreasing">Price: from more to less</option>
                </select>
            </div>
        </div>
        <div class="divider"></div>
        <div class="container">
            <div class="filters">
                <div>
                    <h3>Price range</h3>
                    <div class="price_range">
                        <label for="fromPrice">From</label>
                        <input type="number" id="fromPrice" name="fromPrice" min="0" max="1000" step="1">
                        <label for="toPrice">To</label>
                        <input type="number" id="toPrice" name="toPrice" min="0" max="500" step="1">
                    </div>
                    <button class="button_apply" disabled>Apply</button>
                </div>
                <div class="filter">
                    <label for="genre">Genre</label>
                    <select name="genre" id="genre">
                        <option value="">Choose an option</option>
                        <option value="action">Action</option>
                        <option value="adventure">Adventure</option>
                        <option value="rpg">RPG</option>
                        <option value="shooter">Shooter</option>
                        <option value="strategy">Strategy</option>
                        <option value="sports">Sports</option>
                        <option value="racing">Racing</option>
                        <option value="simulation">Simulation</option>
                        <option value="horror">Horror</option>
                        <option value="platformer">Platformer</option>
                        <option value="puzzle">Puzzle</option>
                    </select>
                </div>
                
                <div class="filter">
                    <label for="platform">Platform</label>
                    <select name="platform" id="platform">
                        <option value="">Choose an option</option>
                        <option value="pc">PC</option>
                        <option value="ps5">PlayStation 5</option>
                        <option value="ps4">PlayStation 4</option>
                        <option value="xbox_series">Xbox Series X|S</option>
                        <option value="xbox_one">Xbox One</option>
                        <option value="switch">Nintendo Switch</option>
                        <option value="mobile">Mobile</option>
                    </select>
                </div>         
            </div>
            <section class="games_section">
                <div class="games" id="gamesContainer"></div>   
            </section>   
        </div> 
        <div id="pagination" class="pagination"></div>
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
        const games = [
            { name: "Overwatch 2", price: 29, image: "./Images/Overwatch_2_Steam_artwork.jpg" },
            { name: "Leage of legends", price: 39, image: "./Images/League of Legends/league-of-legends.avif" },
            { name: "Valorant", price: 40, image: "./Images/Valorant/MV5BZmQwMjQ2ZTUtZmM5MC00MTdkLWIxYzgtODU1NzQ4Zjg4NmMxXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg" },
            { name: "Apex Legends", price: 50, image: "./Images/Apex Legends/Apex_legends_cover.jpg" },
            { name: "FIFA 23", price: 30, image: "./Images/Overwatch_2_Steam_artwork.jpg" },
            { name: "Minecraft", price: 20, image: "./Images/Overwatch_2_Steam_artwork.jpg" },
            { name: "Resident Evil 4", price: 45, image: "./Images/Overwatch_2_Steam_artwork.jpg" },
            { name: "The Witcher 3", price: 35, image: "./Images/Overwatch_2_Steam_artwork.jpg" },
            { name: "GTA V", price: 25, image: "./Images/Overwatch_2_Steam_artwork.jpg" },
            { name: "Red Dead Redemption 2", price: 50, image: "./Images/Overwatch_2_Steam_artwork.jpg" },
            { name: "Overwatch 2", price: 29, image: "./Images/Overwatch_2_Steam_artwork.jpg" },
            { name: "Cyberpunk 2077", price: 39, image: "./Images/Overwatch_2_Steam_artwork.jpg" },
            { name: "Elden Ring", price: 40, image: "./Images/Overwatch_2_Steam_artwork.jpg" },
            { name: "Halo Infinite", price: 50, image: "./Images/Overwatch_2_Steam_artwork.jpg" }
        ];

        let gamesOrdered = [...games];
        let currentPage = 1;
        const itemsPerPage = 10;

        const gamesContainer = document.getElementById("gamesContainer");
        const articlesCount = document.getElementById("articles_count");
        const paginationContainer = document.getElementById("pagination");
        const orderBySelects = document.querySelectorAll("#order_by");

        function renderGames() {
            gamesContainer.innerHTML = "";
            const start = (currentPage - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            const gamesToShow = gamesOrdered.slice(start, end);

            gamesToShow.forEach(game => {
                const gameDiv = document.createElement("div");
                gameDiv.classList.add("game");

                gameDiv.innerHTML = `
                    <div class="game_link" style="cursor: pointer;">
                        <img class="image_game" src="${game.image}" alt="${game.name}" />
                    </div>
                    <div class="game_link" style="cursor: pointer;">
                        <p>${game.name}</p>
                    </div>
                    <div class="price_icon">
                        <p>${game.price} €</p>
                        <div class="heart">
                            <img src="./Images/heart-svgrepo-com.svg" alt="Heart" class="icon">
                        </div>
                    </div>
                `;

                const urlParams = new URLSearchParams(window.location.search);
                const loginParam = urlParams.get("login");

                gameDiv.querySelectorAll(".game_link").forEach(link => {
                    link.addEventListener("click", function () {
                        const gameName = this.getAttribute("data-game-name");
                        if (loginParam) {
                            window.location.href = `gameDetails.html?name=${encodeURIComponent(game.name)}&login=valid`;
                        }
                        else{
                            window.location.href = `gameDetails.html?name=${encodeURIComponent(game.name)}`;
                        }
                    });
                });

                gamesContainer.appendChild(gameDiv);
            });

            articlesCount.textContent = `${gamesOrdered.length} articles`;
            renderPagination();
        }

        function renderPagination() {
            paginationContainer.innerHTML = "";
            const totalPages = Math.ceil(gamesOrdered.length / itemsPerPage);

            for (let i = 1; i <= totalPages; i++) {
                const pageButton = document.createElement("button");
                pageButton.textContent = i;
                pageButton.classList.add("page_button");
                if (i === currentPage) pageButton.classList.add("active");

                pageButton.addEventListener("click", function () {
                    currentPage = i;
                    renderGames();
                });

                paginationContainer.appendChild(pageButton);
            }
        }

        function sortGames(order) {
            if (order === "price_increasing") {
                gamesOrdered.sort((a, b) => a.price - b.price);
            } else if (order === "price_decreasing") {
                gamesOrdered.sort((a, b) => b.price - a.price);
            } else {
                gamesOrdered = [...games];
            }
            currentPage = 1; 
            renderGames();
        }

        orderBySelects.forEach(select => {
                select.addEventListener("change", function () {
                    sortGames(select.value);
                });
            });

        renderGames();
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
    document.addEventListener("DOMContentLoaded", function () {
        const genreSelects = document.querySelectorAll("#genre");
        const platformSelects = document.querySelectorAll("#platform");
        const fromPrices = document.querySelectorAll("#fromPrice");
        const toPrices = document.querySelectorAll("#toPrice");
        const applyButtons = document.querySelectorAll(".button_apply");
        const filterContainer = document.querySelector(".applied_filters");

        const filterOrder = ["Price", "Genre", "Platform"];
        const filters = {};

        function updateFilterDisplay() {
            filterContainer.innerHTML = "";
            filterOrder.forEach(type => {
                if (filters[type]) {
                    filterContainer.appendChild(filters[type]);
                }
            });
        }

        function addFilterLabel(type, value) {
            if (filters[type]) filters[type].remove();

            const filterLabel = document.createElement("div");
            filterLabel.classList.add("filter_label");
            filterLabel.dataset.type = type;
            filterLabel.innerHTML = `${type}: ${value} <span class="remove">✖</span>`;

            filterLabel.querySelector(".remove").addEventListener("click", function () {
                filterLabel.remove();
                delete filters[type];

                if (type === "Genre") genreSelects.forEach(select => (select.value = ""));
                if (type === "Platform") platformSelects.forEach(select => (select.value = ""));
                if (type === "Price") {
                    fromPrices.forEach(input => (input.value = ""));
                    toPrices.forEach(input => (input.value = ""));
                    toggleApplyButton(0);
                    toggleApplyButton(1);
                }

                updateFilterDisplay();
            });

            filters[type] = filterLabel;
            updateFilterDisplay();
        }

        function toggleApplyButton(index) {
            const fromValue = fromPrices[index].value.trim();
            const toValue = toPrices[index].value.trim();
            applyButtons[index].disabled = !(fromValue !== "" && toValue !== "");
        }

        genreSelects.forEach(select => {
            select.addEventListener("change", function () {
                if (select.value !== "") {
                    addFilterLabel("Genre", select.options[select.selectedIndex].text);
                }
            });
        });

        platformSelects.forEach(select => {
            select.addEventListener("change", function () {
                if (select.value !== "") {
                    addFilterLabel("Platform", select.options[select.selectedIndex].text);
                }
            });
        });

        fromPrices.forEach((input, index) => {
            input.addEventListener("input", () => toggleApplyButton(index));
        });

        toPrices.forEach((input, index) => {
            input.addEventListener("input", () => toggleApplyButton(index));
        });

        applyButtons.forEach((button, index) => {
            button.addEventListener("click", function () {
                const fromValue = fromPrices[index].value.trim();
                const toValue = toPrices[index].value.trim();
                if (fromValue !== "" && toValue !== "") {
                    addFilterLabel("Price", `${fromValue} - ${toValue} €`);
                }
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
