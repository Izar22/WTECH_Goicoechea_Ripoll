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
            min-height: calc(100vh - 14vh);
            padding: 0px;
        }
        .form_section_login {
            width: 40%;
            padding: 30px;
            background: white;
            @media (max-width: 768px) {
                align-items: center;
            }
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
        @media (max-width: 768px) {
            .form_container {
                flex-direction: column;
                align-items: center;
            }

            .divider {
                width: 100%; 
                height: 2px; 
                margin: 20px 0; 
            }

            .form_section_login {
                width: 80%; 
                max-width: 350px; 
            }
        }
        .form_container {
            display: flex;
            flex-wrap: wrap;
            width: 80%;
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
    </style>
</head>
<body>
    <header>
        <a href="{{ route('landing_page') }}" class="title">
            <img src="{{ asset('./Images/LOGO V2 horizontal.png') }}" alt="8-Bit Market Logo" class="logo">
        </a>
        Log In as administrator
    </header>
    <div class="container">
        <section class="form_container">
            <div class="form_section_login">
                <h2>Log In</h2>
                <!--@if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif-->
                <form id="login_form" action="{{ route('admin_login') }}" method="POST">
                    @csrf
                    <label for="email_login">E-mail</label>
                    <input type="email" id="email_login" name="email_login" required>
                    <label for="password_login">Password</label>
                    <input type="password" id="password_login" name="password_login" required>
                    <button type="submit">Log In</button>
                </form>
            </div>
        </section>
    </div>
    <footer>&copy; 2024 8-Bit Market. All rights reserved. 🎮❤️</footer>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const img = document.querySelector(".title img");
        if (window.innerWidth <= 830) {
            img.src = "{{ asset('Images/logo simple.png') }}";
        }
    });
</script>
</html>
