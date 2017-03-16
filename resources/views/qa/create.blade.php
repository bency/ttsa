<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME', "交通安全協會") }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <h3>機車上國道 Q&A 設定後台</h3>
            <form action="{{ isset($qa) ? route('qa.update', ['id' => $qa->id]) : route('qa.store') }}" method="post">
                {{ csrf_field() }}
                {{ isset($qa) ? method_field('PUT') : '' }}
                <div class="form-group">
                    <label>題目</label>
                    <textarea class="form-control" name="subject">{{ isset($qa) ? $qa->subject : '' }}</textarea>
                </div>
                <div class="form-group">
                    <label>回應</label>
                    <textarea class="form-control" name="response">{{ isset($qa) ? $qa->response : '' }}</textarea>
                </div>
                <input class="btn btn-primary pull-right" value="儲存或更新" type="submit">
            </form>
        </div>
    </body>
</html>
