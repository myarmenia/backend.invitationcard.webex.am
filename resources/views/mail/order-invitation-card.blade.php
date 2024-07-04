<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Заказ по пригласительному билету</title>
    <style>
        .cont{
            width:60%;
            margin: 0 auto;
            border:2px solid #000
        }

        @media(max-width: 428px){
            .cont{
                width:100%;
            }
        }
    </style>
</head>

<body style="margin: 0; padding: 0">
    <div class="cont" >
        <div style="width:100%;padding: 40px 0; background:#d9b1e9;color:#000">
            <h2 style="text-align:center">Заказ по пригласительному билету</h2>
        </div>

        <div style="width:100%;padding: 10px 30px;">
            <h3 style="text-align:center; padding: 10px 0; color:#000">Информация о пользователе</h3>
            <div style="font-size: 16px;color:#000">
                <p >
                    <span>Имя:</span>
                    <strong>{{$data['name'] ?? ' ---------------- '}}</strong>
                </p>
                <p>
                    <span>Телефон:</span>
                    <strong>{{$data['phone'] ?? ' ---------------- '}}</strong>
                </p>
                <p>
                    <span>Эл. почта:</span>
                     <strong>{{$data['email'] ?? ' ---------------- '}}</strong>
                    </p>
                <p>
                    <span>Время:</span>
                    <strong>{{$data['time'] ?? ' ---------------- '}}</strong>
                </p>
                <p>
                    <span>Тип:</span>
                    <strong>{{$data['type'] ?? ' ---------------- '}}</strong>
                </p>
                <p>
                    <span>Сообщение:</span>
                    <strong>{{$data['message'] ?? ' ---------------- '}}</strong>
                </p>

            </div>
        </div>
        <div style="width:100%; padding: 10px 0; background:#000; color:#fff">
            <h4 style="text-align:center">Webex Technologies LLC</h4>

        </div>
    <div>
</body>
</html>
