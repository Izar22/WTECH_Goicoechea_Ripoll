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
        .add_game{
            display: flex;
            justify-content: end;
        }
        .action{
            margin: 0 15px;
            text-decoration: none;
            color: #000000;
            @media (max-width: 768px) {
                display: none;
            } 
        }
        .add_text{
            margin: 0 15px;
            text-decoration: none;
            color: #000000;
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
        .image_game{
            width: 120px;
            height: 180px;
            object-fit: cover;
        }
        .game_image_container {
            position: relative; 
        }
        .trash_icon {
            position: absolute;
            top: 10px; 
            right: 10px; 
            width: 30px; 
            height: 30px; 
            cursor: pointer; 
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
        #confirmDelete {
            background-color: rgb(4, 194, 4);
            color: white;
        }
        #cancelDelete {
            background-color: rgb(255, 0, 0);
            color: white;
        }
        .icon{
            width: 24px;
            height: 24px;
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
        .hidden {
            display: none !important;
        }
    </style>
</head>
<body>
    <header>
        <div class="title">
            <a href="CategorizedGamesAdmin.html"> 
                <img class="logo" src="{{ asset('./Images/LOGO V2 horizontal.png') }}" alt="8-Bit Market Logo"/>
            </a>
        </div>
        <form id="searchForm" class="search_bar" action="{{ route('admin_categorized_games') }}" method="GET">
            <input type="hidden" id="categoryInput" name="category" value="{{ request('search') }}">
            <input class="search" id="searchInput" type="text" name="search" value="{{ request('search') }}" placeholder="Search games">
        </form>
        <div class="user_actions">
            <a href="LandingPage.html">
                <img src="{{ asset('./Images/log-out-svgrepo-com.svg') }}" alt="LogOut" class="icon"> 
            </a>
            <a class="action" href="LandingPage.html">Log Out</a>
            <div class="menu">
                <img src="{{ asset('./Images/menu-svgrepo-com.svg') }}" alt="Menu" class="icon">
            </div>
        </div>       
    </header>
    <aside class="sidebar">
        <button class="close_btn">&times;</button> 
        <div>
            <div>
                <form id="searchForm2" class="search" action="{{ route('categorized_games') }}" method="GET">
                    <input type="hidden" id="categoryInput2" name="category" value="{{ request('search') }}">
                    <input class="search" id="searchInput2" type="text" name="search" value="{{ request('search') }}" placeholder="Search games">
                </form>
            </div> 
            <div class="mobile_filters">
                <div class="order_by_mobile">
                    <label for="order_by">Order By</label>
                    <form method="GET" action="{{ route('admin_categorized_games') }}">
                        <input type="hidden" name="platform" value="{{ request('platform') }}">
                        <input type="hidden" name="genre" value="{{ request('genre') }}">
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
        <div class="add_game">
            <a href="{{ route('admin_add_game') }}">
                <img src="{{ asset('./Images/add-ellipse-svgrepo-com.svg') }}" alt="Add" class="icon"> 
            </a>
            <a class="add_text" href="{{ route('admin_add_game') }}">Add new product</a>           
        </div> 
        <div class="top_section">
            <div>
                <h2 id="category_name"></h2>
                <div class="articles_pills">
                    <p id="articles_count">{{ $totalGames }} articles</p>
                    <div class="applied_filters">
                        @if(strlen(request('fromPrice')) > 0 && strlen(request('toPrice')) > 0)
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
                <form method="GET" action="{{ route('admin_categorized_games') }}">
                    <input type="hidden" name="platform" value="{{ request('platform') }}">
                    <input type="hidden" name="genre" value="{{ request('genre') }}">
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
                    <form method="GET" action="{{ route('admin_categorized_games') }}">
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
                    <form method="GET" action="{{ route('admin_categorized_games') }}">
                        <input type="hidden" name="platform" value="{{ request('platform') }}">
                        <input type="hidden" name="order_by" value="{{ request('order_by') }}">
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
                    <form method="GET" action="{{ route('admin_categorized_games') }}">
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
                <div class="games" id="gamesContainer">
                @foreach ($games as $game) 
                    <div class="game">
                        <div class="game_image_container">
                            <img class="image_game" src="{{ asset($game->images->first()->path) }}" alt="{{ $game->images->first()->path }}" />
                            <img src="{{ asset('./Images/trash-full-svgrepo-com-v2.svg') }}" alt="Trash Icon" class="trash_icon" id="openModal" onclick="openModal();"/>
                        </div>
                        <div class="game_link" >
                            <p>{{ $game->title }}</p>
                        </div>
                        <div class="price_icon">
                            <p>{{ $game->price }} €</p>
                            <img class="edit_icon" src="{{ asset('./Images/edit-3-svgrepo-com.svg') }}" alt="Edit" width="24px" height="24px" style="cursor: pointer;">
                        </div>
                    </div>
                @endforeach 
                </div> 
            </section>
        </div> 
        <div class="pagination" class="pagination">
            {{ $games->links('vendor.pagination.custom') }}
        </div>
        <div id="deleteModal" class="modal">
            <div class="modal_content">
                <p>Are you sure you want to delete this product?</p>
                <button id="confirmDelete">Yes</button>
                <button id="cancelDelete">No</button>
            </div>
        </div>
    </main>
    <form id="filtersResetForm" method="GET" action="{{ route('categorized_games') }}" style="display: none;">
        <input type="hidden" name="platform" value="{{ request('platform') }}">
        <input type="hidden" name="genre" value="{{ request('genre') }}">
        <input type="hidden" name="category" value="{{ request('category') }}">
        <input type="hidden" name="order_by" value="{{ request('order_by') }}">
        <input type="hidden" name="fromPrice" value="{{ request('fromPrice') }}">
        <input type="hidden" name="toPrice" value="{{ request('toPrice') }}">
    </form>
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
    document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById("deleteModal");
        const cancelBtn = document.getElementById("cancelDelete");
        const confirmBtn = document.getElementById("confirmDelete");

        cancelBtn.addEventListener("click", function () {
            modal.style.display = "none";
        });

        confirmBtn.addEventListener("click", function () {
            modal.style.display = "none";
        });
    });

    function openModal() {
        const modal = document.getElementById("deleteModal");
        console.log("Modal abierto");
        modal.style.display = "flex";
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const updatePagination = () => {
            const pageButtons = document.querySelectorAll('.page_button');
            const screenWidth = window.innerWidth;
            const pageLinksContainer = document.getElementById('page_buttons');
            const currentPageContainer = document.getElementById('current_page');

            if (screenWidth < 600) {
                // En pantallas pequeñas (<600px), mostrar la página actual
                currentPageContainer.classList.remove('hidden'); // Asegurar que se muestre
                pageLinksContainer.classList.add('hidden'); // Ocultar las páginas numeradas
            } else {
                // En pantallas grandes (>600px), ocultar la página actual
                currentPageContainer.classList.add('hidden'); // Ocultar la página actual
                pageLinksContainer.classList.remove('hidden'); // Mostrar las páginas numeradas
            }

            // Mostrar u ocultar los botones de paginación
            pageButtons.forEach(button => {
                if (screenWidth < 600) {
                    // En pantallas pequeñas, solo mostrar "Previous", "Next" y la página actual
                    if (button.classList.contains('active') || button.innerText === "Previous" || button.innerText === "Next" || button === currentPageContainer) {
                        button.style.display = 'inline-block';
                    } else {
                        button.style.display = 'none';
                    }
                } else {
                    // En pantallas grandes, mostrar todos los botones
                    button.style.display = 'inline-block';
                }
            });
        };

        // Llama a la función al cargar la página
        updatePagination();

        // Actualiza la paginación cuando se redimensione la ventana
        window.addEventListener('resize', updatePagination);
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const removeButtons = document.querySelectorAll('.remove');

        removeButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                const filterType = button.getAttribute('data-filter');
                const form = document.getElementById('filtersResetForm');

                if (!form) return;

                switch (filterType) {
                    case 'price':
                        form.querySelector('[name="fromPrice"]').value = '';
                        form.querySelector('[name="toPrice"]').value = '';
                        break;
                    case 'genre':
                        form.querySelector('[name="genre"]').value = '';
                        break;
                    case 'platform':
                        form.querySelector('[name="platform"]').value = '';
                        break;
                }

                form.submit();
            });
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
</html>
