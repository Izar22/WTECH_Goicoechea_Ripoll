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
            z-index: 100;
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
            gap: 20px;
            justify-content: space-around;
            @media (max-width: 768px) {
                flex-direction: column;
                align-items: center;
            }
        }
        .back{
            display: flex;
            align-items: center;
            font-size: 20px;
            margin-left: 10px;
            cursor: pointer;
        }
        .back p{
            margin: 0;
            margin-left: 5px;
        }
        .game_name{
            display: flex;
            justify-content: space-between;
            flex-direction: row;
            align-items: center;
            margin: 0 2vw 0 3vw;
            @media (max-width: 768px) {
                width: 100%;
                height: auto;
                flex-wrap: wrap;
            }
        }
        .game_name input{
            font-family: "Kanit", sans-serif;
            width: 200px;
            border: 1px solid #ccc;
            padding: 5px;
            font-size: 16px;
        }
        .game_name_field{
            gap: 5px;
            display: flex;
            justify-content: left;
            flex-direction: row;
            align-items: center;
        }
        .game {
            width: auto;
            height: 400px;
            @media (max-width: 768px) {
                width: 100%;
                height: auto;
            }
        }
        .delete_button{
            justify-self: end;
            display: flex;
            align-items: center;
            font-size: 20px;
        }
        .trash_icon{
            width: 50px;
            height: 50px;
        }
        .game_details{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            gap: 30px;
            @media (max-width: 768px) {
                gap: 10px; 
                justify-content: center;
                width: 100%;
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
        .image_upload_container {
            background-color: #275DAD;
            display: flex;
            width: 40vh;
            height: 100%;
            align-items: center;
            justify-content: center;
            position: relative;
            flex-direction: column;
            @media (max-width: 768px) {
                min-height: 50vh;
                width: 80%;
                height: 100%;
            }
        }
        #image_list {
            list-style: none; 
            padding: 0;
            width: 80%; 
        }
        .details input{
            font-family: "Kanit", sans-serif;
            width: 97%;
            border: 1px solid #ccc;
            padding: 5px;
            font-size: 16px;
            @media (max-width: 768px) {
                width: 99%;  
            }
        }
        .details textarea {
            font-family: "Kanit", sans-serif;
            width: 97%;
            max-width:100%;
            border: 1px solid #ccc;
            padding: 5px;
            font-size: 16px;
            @media (max-width: 768px) {
                width: 99%;  
                min-height: 200px;
            }
        }
        .input-group select {
            font-family: "Kanit", sans-serif;
            width: 100%;
            border: 1px solid #ccc;
            padding: 5px;
            font-size: 16px;
            @media (max-width: 768px) {
                width: 99%;  
            }
        }
        .price_box { 
            padding: 20px;
            border: 1px solid black;
            border-radius: 12px;
            background-color: white;
            text-align: center;
            min-width: 300px;
            @media (max-width: 768px) {
                width: 100%;
                padding: 0;
                justify-content: center;
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
            color:#ffffff;
            background-color: #275DAD;
            border: none;
            cursor: pointer;
            border-radius: 12px;
        }
        .button:hover{
            background-color: #7ca6e4;
        }
        .right_part { 
            gap: 15px;
            display: flex;
            flex-direction: column;
            @media (max-width: 768px) {
                justify-content: center;
                margin-top: 10px;
                width: 100%;  
                padding: 5px;
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
        .heart {
            cursor: pointer;
        }
        .price{
            margin-top: 10px;
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
        #confirmLogout {
            background-color: rgb(4, 194, 4);
            color: white;
        }
        #cancelLogout {
            background-color: rgb(255, 0, 0);
            color: white;
        }
        .form_logout{
            display: inline-flex;
        }
        .icon{
            width: 24px;
            height: 24px;
        }
        .input-group{
            margin: 16px 0;
        }

        .text-red-500{
            color: red;
            font-size: 10px;
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
            <a class="nav open-logout" href="#">
                <img src="{{ asset('./Images/log-out-svgrepo-com.svg') }}" alt="LogOut" class="icon">
            </a>
            <a class="action nav open-logout" href="#">Log Out</a>
            <div class="menu">
                <img src="{{ asset('./Images/menu-svgrepo-com.svg') }}" alt="Menu" class="icon">
            </div>
        </div>       
    </header>
    <aside class="sidebar">
        <button class="close_btn">&times;</button> 
        <div>
            <input class="search" type="text" placeholder="Search">
        </div>         
    </aside>
    <main>
        <div class="back" onclick="customBack(); return false;">
            <img src="{{ asset('./Images/arrow-narrow-left-svgrepo-com.svg') }}" alt="Arrow" class="icon">
            <p>Back</p>
        </div>
        <form action="{{ route('admin_edit_game_put', ['id' => $game->id]) }}" method="POST" enctype="multipart/form-data">
            @method('PUT') 
            @csrf
            <div class="game_name">
                <div class="game_name_field">
                    <label for="game_name"><h2>Game Name:</h2></label>
                    <input type="text" id="genre" name="title" value='{{ $game->title }}'>
                    @error('title')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="delete_button" >
                    <strong onclick="" style="cursor: pointer;">Delete</strong>
                    <img src="{{ asset('./Images/trash-full-svgrepo-com.svg') }}" 
                    alt="Trash Icon" 
                    class="trash_icon openModalBtn" 
                    data-id="{{ $game->id }}" 
                    style="cursor: pointer;" />
                </div>
            </div>
            <div class="container">
                <section  class="game_details">
                    <div id="image_upload_container" class="image_upload_container">
                        <ul id="image_list">
                            @foreach ($game->images as $image)
                            <li data-existing-image="{{ $image->id }}">
                                {{ basename($image->path) }}
                                <span style="cursor: pointer; color: red;" onclick="removeExistingImage(this, {{ $image->id }})"> X</span>
                            </li>
                        @endforeach
                        </ul>
                        <img src="{{ asset('./Images/plus-circle-1427-svgrepo-com.svg') }}" id="add_image" style="cursor: pointer; width: 50px; height: 50px;" alt="Add Image">
                        @error('images')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                        @foreach ($errors->get('images.*') as $imageErrors)
                            @foreach ($imageErrors as $error)
                                <div class="text-red-500 text-sm">{{ $error }}</div>
                            @endforeach
                        @endforeach
                    </div>
                    <input type="hidden" name="deleted_images" id="deleted_images_input">
                    <div class="details">
                        <div class="input-group">
                            <label for="publisher_name"><strong>Publisher:</strong></label>
                            <input type="text" id="publisher_name" name="publisher_name" value='{{ $game->publisher_name }}'>
                            @error('publisher_name')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group">
                            <label for="platform"><strong>Platform:</strong></label>
                            <input type="text" id="platform" name="platform" value='{{ $game->platform }}'>
                            @error('platform')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group">
                            <label for="region"><strong>Region:</strong></label>
                            <input type="text" id="region" name="region" value='{{ $game->region }}'>
                            @error('region')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group">
                            <label for="genre"><strong>Genre:</strong></label>
                            <input type="text" id="genre" name="genre" value='{{ $game->genre }}'>
                            @error('genre')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group">
                            <label for="category"><strong>Category:</strong></label>
                            <select id="category" name="category">
                                <option value="Short games" {{ $game->category == 'Short games' ? 'selected' : '' }}>Short games</option>
                                <option value="Long games" {{ $game->category == 'Long games' ? 'selected' : '' }}>Long games</option>
                                <option value="Pixel art" {{ $game->category == 'Pixel art' ? 'selected' : '' }}>Pixel art</option>
                                <option value="Open world" {{ $game->category == 'Open world' ? 'selected' : '' }}>Open world</option>
                            </select>
                            @error('category')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group">
                            <label for="release_date"><strong>Date of release:</strong></label>
                            <input type="date" id="release_date"  name="release_date" value='{{ $game->release_date }}'>
                        </div>
                        <textarea id="description" name="description">{{ $game->description }}</textarea>
                        @error('description')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </section >
                <section  class="right_part">
                    <div class="price_box">
                        <h3 class="price">Price</h3>
                        <input type="number" id="price" name="price" value='{{ $game->price }}' min="1" step="0.01">
                        @error('price')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="button_save">
                        <button class="button">Save Changes</button>
                    </div>
                </section >
            </div>
        </form>
        <div id="deleteModal" class="modal">
            <div class="modal_content">
                <p>Are you sure you want to delete this product?</p>
                <button id="confirmDelete">Yes</button>
                <button id="cancelDelete">No</button>
            </div>
        </div>
        <div id="logoutModal" class="modal">
            <div class="modal_content">
                <p>Are you sure you want to log out?</p>
                <form action="/admin/logout" method="POST" class="form_logout">
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
    document.addEventListener("DOMContentLoaded", function () {
        let productIdToDelete = null;

        document.querySelectorAll('.openModalBtn').forEach(button => {
            button.addEventListener('click', function () {
                productIdToDelete = this.dataset.id;
                document.getElementById('deleteModal').style.display = 'flex';
            });
        });

        document.getElementById('cancelDelete').addEventListener('click', function () {
            productIdToDelete = null;
            document.getElementById('deleteModal').style.display = 'none';
        });

        document.getElementById('confirmDelete').addEventListener('click', function () {
            if (!productIdToDelete) return;

            fetch(`/admin/games/${productIdToDelete}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = "/admin/categorized_games"; 
                } else {
                    alert('Error deleting the product.');
                }
            });
            document.getElementById('deleteModal').style.display = 'none';
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
            window.location.href = "/";
        });

        cancelLogoutBtn.addEventListener("click", function () {
            logoutModal.style.display = "none"; 
        });
    });
</script> 
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const addImageBtn = document.getElementById("add_image");
        const imageList = document.getElementById("image_list");
        const uploadContainer = document.getElementById("image_upload_container");

        imageList.style.maxHeight = "calc(100% - 100px)";
        imageList.style.overflowY = "auto";
        imageList.style.overflowX = "hidden";
        imageList.style.textOverflow = "ellipsis";

        addImageBtn.addEventListener("click", function () {
            const fileInput = document.createElement("input");
            fileInput.type = "file";
            fileInput.accept = "image/*";

            fileInput.name = "images[]";
            fileInput.style.display = "none"; 

            document.getElementById("image_upload_container").appendChild(fileInput); 
            fileInput.addEventListener("change", function () {
                if (fileInput.files.length > 0) {
                    const file = fileInput.files[0];
                    const listItem = document.createElement("li");
                    listItem.textContent = file.name;

                    const removeBtn = document.createElement("span");
                    removeBtn.textContent = " X";
                    removeBtn.style.cursor = "pointer";
                    removeBtn.style.color = "red";
                    removeBtn.addEventListener("click", function () {
                        imageList.removeChild(listItem);

                        fileInput.remove(); 

                        if (imageList.children.length === 0) {
                            uploadContainer.style.justifyContent = "center";
                        }
                    });

                    listItem.appendChild(removeBtn);
                    imageList.appendChild(listItem);

                    if (imageList.children.length >= 1) {
                        uploadContainer.style.justifyContent = "start";
                    }
                }
            });
            fileInput.click();
        });
        document.querySelector("form").addEventListener("submit", function (e) {
            const fileInputs = this.querySelectorAll('input[type="file"]');
            fileInputs.forEach(input => {
                console.log("Archivo:", input.files[0]);
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const openModalBtn = document.getElementById("openModal");
        const modal = document.getElementById("deleteModal");
        const cancelBtn = document.getElementById("cancelDelete");
        const confirmBtn = document.getElementById("confirmDelete");
        
        openModalBtn.addEventListener("click", function () {
            modal.style.display = "flex";
        });

        cancelBtn.addEventListener("click", function () {
            modal.style.display = "none";
        });

        confirmBtn.addEventListener("click", function () {
            modal.style.display = "none";
            window.location.href = `CategorizedGamesAdmin.html`;
        });
    });
</script>
<script>
    function customBack() {
            window.location.href = "/admin/categorized_games";  
    }
</script>
<script>
    function removeExistingImage(span, imageId) {
        const li = span.parentElement;
        li.remove();

        const input = document.getElementById("deleted_images_input");

        // Obtener el array actual de imágenes eliminadas (si existe)
        let current = input.value ? JSON.parse(input.value) : [];

        // Agregar el ID de la imagen que se está eliminando
        current.push(imageId);

        // Asignar el valor del campo como un string JSON
        input.value = JSON.stringify(current);
    }
</script>
</html>
