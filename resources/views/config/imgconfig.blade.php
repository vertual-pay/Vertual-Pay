<h1>請求の背景画像を変更です。以下からお選びください</h1>
<h2>現在のお客様の画像</h2>
<img src="/{{ $data->image_frame }}.png">
<form action = "{{route('imgconfig')}}" method="post">
<input type="radio" value=1>
<img src="/1.png">
<input type="radio" value=2>
<img src="/2.png">
<input type="radio" value=3>
<img src="/3.png">
<input type="radio" value=4>
<img src="/4.png">
<input type="radio" value=5>
<img src="/5.png">
</fome>
