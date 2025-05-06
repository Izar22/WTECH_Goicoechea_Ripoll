<!DOCTYPE html>
<html lang="es">
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
            background-color: rgb(255, 255, 255);
            
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
            color: rgb(0, 0, 0);
            font-weight: bold;
            font-size: 12px;
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
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
            color: rgb(0, 0, 0);
            font-size: 1.2em;
            font-weight: bold;
            @media (max-width: 768px) {
                font-size: 15px;
            }
        }
        .container {
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 108.4px);
            padding: 0px;
            margin-top: 70px;
            margin-bottom: 35px;
        }
        .form_section_login {
            width: 40%;
            padding: 30px;
            background: white;
            @media (max-width: 768px) {
                align-items: center;
            }
        }
        .form_section_register {
            width: 40%;
            padding: 30px;
            background: white;
            
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            
        }
        label {
            font-weight: bold;
            margin: 10px 0 5px;
        }
        input {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 16px;
        }
        button {
            font-family: "Kanit", sans-serif;
            margin-top: 15px;
            padding: 12px;
            background: #275DAD;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            width: 200px;
            cursor: pointer;
            transition: background 0.3s;
            align-self: center;
        }
        button:hover {
            background: #7ca6e4;
            
        }
        .divider {
            width: 2px;
            background: black;
            margin: 0 20px;
            align-self: stretch;
        }
        .form_container {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            justify-content: space-around;
        }
        .title {
            position: absolute;
            left: 20px; 
            display: flex;
            align-items: center;
        }
        .logo{
            height: 50px;
            width: auto;
            @media (max-width: 768px) {
                height: 40px;
            }
        }
        .admin_link {
            text-align: center;
            font-size: 14px;
            margin-top: 10px;
        }
        .admin_link a {
            color: #275DAD;
            text-decoration: none;
        }
        .admin_link a:hover {
            text-decoration: underline;
        }
        @media (max-width: 830px) {

            #header_text::after {
                content: "Welcome to 8-Bit Market"; 
            }
            #header_text {
                content: none; 
            }

            .form_container {
                flex-direction: column;
                align-items: center;
            }

            .divider {
                align-self: center;
                width: 80%; 
                height: 2px; 
                margin: 20px 0; 
            }

            .form_section_login,
            .form_section_register {
                width: 80%; 
                max-width: 350px; 
            }
        }
    </style>
</head>
<body>
    <header>
        <a href="{{ route('landing_page') }}" class="title">
            <img src="{{ asset('./Images/LOGO V2 horizontal.png') }}" alt="8-Bit Market Logo" class="logo">
        </a>
        Log In or Create an Account
    </header>
    <div class="container">
        <div class="form_container">
            <section class="form_section_login">
                <h2>Log In</h2>
                <form id="login_form" action="/log_in" method="POST">
                    @csrf
                    <label for="email_login">E-mail</label>
                    <input type="email" id="email_login" name="loginemail" required>
                    <label for="password_login">Password</label>
                    <input type="password" id="password_login" name="loginpassword" required>
                    <button type="submit">Log In</button>
                </form>
                <div class="admin_link">
                    <p><a href="{{ route('admin_login_form') }}">Log in as an Administrator</a></p>
                </div>
            </section>
            <div class="divider"></div>
            <section class="form_section_register">
                <h2>Create Account</h2>
                <form id="singIn_form" action="/sign_up" method="POST">
                    @csrf
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                    <label for="email_register">E-mail</label>
                    <input type="email" id="email_register" name="email" required>
                    <label for="password_register">Password</label>
                    <input type="password" id="password_register" name="password" required>
                    <label for="repeat_password">Repeat password</label>
                    <input type="password" id="repeat_password"  name="password2" required>
                    <button type="submit">Create</button>
                </form>
            </section>
        </div>
    </div>
    <footer>&copy; 2024 8-Bit Market. All rights reserved. 🎮❤️</footer>
</body>
<script>

/*document.getElementById("login_form").addEventListener("submit", function (event) {
    event.preventDefault(); 

    const currentPage = window.location.href; 
    let previousPage = document.referrer || "index.html";

    if (previousPage === currentPage) {
        previousPage = "index.html"; 
    }

    window.location.href = previousPage + (previousPage.includes("?") ? "&" : "?") + "login=valid";
});

document.getElementById("singIn_form").addEventListener("submit", function (event) {
    event.preventDefault(); 

    const currentPage = window.location.href; 
    let previousPage = document.referrer || "index.html";

    if (previousPage === currentPage) {
        previousPage = "index.html"; 
    }

    window.location.href = previousPage + (previousPage.includes("?") ? "&" : "?") + "login=valid";
});*/
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const img = document.querySelector(".title img");
        if (window.innerWidth <= 830) {
            img.src = "{{ asset('Images/logo simple.png') }}";
        }
    });
</script>
</html>
