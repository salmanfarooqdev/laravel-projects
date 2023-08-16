<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        .containers{
            width:100%;
            height:100vh;
            background-color: #2F4D40;
            display:flex;
            justify-content:center;
            align-items:center;
        }
        .containers2{
            width:100%;
            height:100vh;
            background-color: #aed1c2;
            
        }
        .boxDiv{
            font-size:20px;
            border: 1px solid black;
            padding:10px;
            margin:10px;
            height:300px;
            background-color:black;
            color:aliceblue;
            border-radius:20px;
            padding:40px;
        }
        .alert{
            font-size: 16px;
            color: rgb(198, 15, 15);
        }
    </style>

</head>

<body>

        
        <div class="containers">
        <div class="boxDiv">
        <h1 style="text-align:center;">Log In</h1>
        <form action="/login" method="POST">
        @csrf

            <table>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="loginname"></td>
                </tr>
                <tr>
                    <td>password:</td>
                    <td><input type="password" name="loginpassword"></td>
                </tr>
                <tr>
                    <td style="position:relative; left:70px; top:20px;"><button>Log In</button></td>
                </tr>
            </table>
            
                
            <br>
        </form>
        @error('login')
            <div class="alert">{{ $message }}</div>
            @enderror
        <a href="/" style="position:relative; left:90px; top:50px; color:aliceblue;">Register</a>
    </div>
    </div>
        
    
    
</body>
</html>