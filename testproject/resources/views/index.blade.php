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
    </style>

</head>

<body>
    
        @auth

        <div class="containers2">
           
            <form action="/logout" method="POST">
                @csrf
                <button>Log out</button>
            </form>

            <div style="border:2px solid black; margin: 10px; padding:20px;">

            <h1>Create a New Post</h1>
            <form action="/create-post" method="POST">
                @csrf
                Title: <input type="text" name="title" placeholder="title">
                Body: <textarea name="body" placeholder="body content"></textarea>
                <button>Save Post</button>
            </form>
            </div>
        

        <div style="border:2px solid black; margin: 10px; padding:20px;">
            <h1>POSTS</h1>
            @foreach ($posts as $item )
            <div style="background-color:grey; padding:10px; margin: 10px;">
                {{$item['title']}} by {{$item->modelConnector->name}}<br>
                {{$item['body']}}

                <a href="/edit-post/{{$item->id}}">Edit</a>
                <form action="/delete-post/{{$item->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
                
            @endforeach

        </div>

    </div>
        
        @else
        <div class="containers">
        <div class="boxDiv">
        <h1 style="text-align:center;">Register</h1>
        <form action="/register" method="POST">
        @csrf

            <table>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td>password:</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td style="position:relative; left:70px; top:20px;"><button>Register</button></td>
                </tr>
            </table>

                
            
            <br>
        </form>
        <a href="/login" style="position:relative; left:90px; top:50px; color:aliceblue;">Login</a>
    </div>
    </div>
    @endauth
        
  
   
    
    
</body>
</html>