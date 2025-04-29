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
        .image_upload_container {
            background-color: #275DAD;
            display: flex;
            width: 258px;
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
                width: 80%;  
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
                min-height: 40vh; 
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
                padding: 10px 0;
                min-width: 100px;
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
                width: 80%;  
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
    <header>
        <div class="title">
            <a href="CategorizedGamesAdmin.html"> 
                <img class="logo" src="{{ asset('Images/LOGO V2 horizontal.png') }}" alt="8-Bit Market Logo"/>
            </a>
        </div>
        <form class="search_bar" action="#" method="GET">
            <input class="search" type="text" placeholder="Search">
        </form>
        <div class="user_actions">
            <a href="LandingPage.html">
                <img src="./Images/log-out-svgrepo-com.svg" alt="LogOut" class="icon"> 
            </a>
            <a class="action" href="LandingPage.html">Log Out</a>
            <div class="menu">
                <img src="./Images/menu-svgrepo-com.svg" alt="Menu" class="icon">
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
            <img src="./Images/arrow-narrow-left-svgrepo-com.svg" alt="Arrow Back" class="icon"> 
            <p>Back</p>
        </div>
        <div class="game_name">
            <div class="game_name_field">
                <label for="game_name"><h2>Game Name:</h2></label>
                <input type="text" id="genre" value="xxxxxxxxxx">
            </div>
        </div>
        <section class="container">
            <div class="game_details">
                <div id="image_upload_container" class="image_upload_container">
                    <ul id="image_list"></ul>
                    <img src="Images/plus-circle-1427-svgrepo-com.svg" id="add_image" style="cursor: pointer; width: 50px; height: 50px;" alt="Add Image">
                </div>
                <div class="details">
                    <div class="input-group">
                        <label for="platform"><strong>Platform:</strong></label>
                        <input type="text" id="platform" value="xxxxxxxxxx">
                    </div>
                    <div class="input-group">
                        <label for="region"><strong>Region:</strong></label>
                        <input type="text" id="region" value="xxxxxxxxxx">
                    </div>
                    <div class="input-group">
                        <label for="genre"><strong>Genre:</strong></label>
                        <input type="text" id="genre" value="xxxxxxxxxx">
                    </div>
                    <div class="input-group">
                        <label for="release_date"><strong>Date of release:</strong></label>
                        <input type="date" id="release_date"  value="xx/xx/xxxx">
                    </div>
                    <textarea id="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</textarea>
                </div>
            </div>
            <div class="right_part">
                <div class="price_box">
                    <h3 class="price">Price</h3>
                    <input type="number" id="price" value="15" min="1">
                </div>
                <div class="button_save">
                    <button class="button">Save Changes</button>
                </div>
            </div>
        </section>
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
        document.querySelector(".button").addEventListener("click", function () {
            const gameData = {
                platform: document.getElementById("platform").value,
                region: document.getElementById("region").value,
                genre: document.getElementById("genre").value,
                release_date: document.getElementById("release_date").value,
                description: document.getElementById("description").value,
                price: document.getElementById("price").value
            };
    
            console.log("Saving game data:", gameData); 
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
    });
</script>
<script>
    function customBack() {
        const previousPage = document.referrer;
        const currentPage = window.location.href;

        if (previousPage === currentPage) {
            window.location.href = "CategorizedGamesAdmin.html";  
        } else {
            window.location.href = previousPage;
        }
    }
</script>
</html>
