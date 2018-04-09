@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <body>
                <div id="app">
                  <h1> The gretest news! </h1>

                  <div class="columns medium-3" v-for="result in results">
  <div class="card">
    <div class="card-divider">
      @{{ result.title }}
    </div>

  </div>
</div>
                  <h3 class="text-center">VueNews</h3>

                      <div><button type="button" >送信</button></div>
                  <hello></hello>
                  <hello name="Laravel"></hello>
                  <hello name="Vue.js"></hello>
                </div>
              </body>
                <div class="card-header">Dashboard</div>

                <div id="text-box">
    URL：<textarea id="set_url" rows="5"></textarea>
  </div>

  <div　id="size"-box">
    倍率:<input type="number" id="qr_size" value="5" max="33" min="1"/>
  </div>


  <div　id="size"-box">
    文字色:<input type="color" id="qr_color" value="#000000" />
  </div>

  <div　id="size"-box">
    背景色:<input type="color" id="qr_background_color" value="#ffffff" />
  </div>


  <div　id="size"-box">
    フォーマット:<select id="qr_format">
  <option value="jpg">jpg</option>
  <option value="png">png</option>
  <option value="gif">gif</option>
  <option value="svg">svg</option>
  </select>
  </div>



  <div><button type="button" >送信</button></div>


  <div id="view_qr"></div

    <div><button type="button" >送信</button></div>



                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <script src="https://unpkg.com/vue"></script>
                    <script src="app.js"></script>
                    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
