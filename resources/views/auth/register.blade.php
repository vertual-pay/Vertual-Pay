@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header-">{{ __('新規登録') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('お店の名前') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @if(Session::has('message'))
    <div class="alert alert-info">{{Session::get('message')}}</div>
@endif
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワード確認') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                                              <!-- 利用規約 -->
                          <div class="newaccount_OK">
                            <p>
                              <input type="checkbox" value="利用規約に同意する" style="width:20px; height:20px;" required>
                              利用規約に同意する
                          </div>
                          <div class="description_usingOK">
                            <!-- 利用規約詳細 -->
                            <p>
                            利用規約<br><br>

                            ■ご利用の注意点<br>
                            １、@NEMYはQRコード発行ツールです。仮想通貨の取引仲介・保管はいたしません。 <br>
                            ２、@NEMYが秘密鍵を要求することはありません。<br>
                            ３、@NEMY は寄付で運営されている無料ツールであり、ユーザへ請求はいたしません。<br>
                            ４、受取アドレスに取引所のアドレスは使用しないでください。<br>
                            ５、仮想通貨の取り扱い、経営相談などは受け付けておりません。<br><br>

                            ■禁止行為<br>
                            詐欺等の犯罪に結びつく行為。法令、裁判所の判決、決定もしくは命令、又は法令上拘束力のある行政措置に違反する行為。公の秩序又は善良の風俗を害するおそれのある行為。@NEMY又は第三者の著作権、商標権、特許権等の知的財産権、名誉権、プライバシー権、その他法令上又は契約上の権利を侵害する行為。過度に暴力的な表現、露骨な性的表現、人種、国籍、信条、性別、社会的身分、門地等による差別につながる表現、自殺、自傷行為、薬物乱用を誘引又は助長する表現、その他反社会的な内容を含み他人に不快感を与える表現を投稿又は送信する行為。@NEMYもしくは第三者になりすます行為又は意図的に虚偽の情報を流布させる行為。@NEMYがスパムと判断する行為。営業、宣伝、広告、勧誘、その他営利を目的とする行為。性行為やわいせつな行為を目的とする行為、面識のない異性との出会いや交際を目的とする行為、他のユーザーに対する嫌がらせや誹謗中傷を目的とする行為、@NEMYが予定している利用目的と異なる目的で@NEMYを利用する行為。反社会的勢力に対する利益供与その他の協力行為。宗教活動又は宗教団体への勧誘行為。他人の個人情報、登録情報、利用履歴情報などを、不正に収集、開示又は提供する行為。@NEMYのサーバやネットワークシステムに支障を与える行為、BOT、チートツール、その他の技術的手段を利用してサービスを不正に操作する行為。@NEMYのシステムの不具合を意図的に利用する行為、同様の質問を必要以上に繰り返す等、@NEMYに対し不当な問い合わせ又は要求をする行為。その他@NEMYによるQRコード発行ツールの運営又は他のユーザーによるこれらの利用を妨害し、これらに支障を与える行為。上記のいずれかに該当する行為を援助又は助長する行為。その他、@NEMYが不適当と判断した行為。<br><br>
                            ■有効期限<br>
                            @NEMYに有効期限はありませんが、最終利用時から1年間以上経過している場合は、@NEMYはあらかじめユーザーに通知することなくアカウントを削除することができます。最終利用時とは、ログインを指します。<br><br>
                            ■ 免責<br>
                            @NEMYは提供する全てのサービスに事実上又は法律上の瑕疵（安全性、信頼性、正確性、完全性、有効性、特定の目的への適合性、セキュリティなどに関する欠陥、エラーやバグ、権利侵害などを含みます。）がないことを明示的にも黙示的にも保証しておりません。@NEMYは、ユーザーに対して、かかる瑕疵を除去してQRコード発行ツールを提供する義務を負いません。@NEMYは、QRコード発行に起因してユーザーに生じたあらゆる損害について一切の責任を負いません。@NEMYに充てられた寄付金は、全て@NEMYの運営、開発に充てられますが、金額や用途など開示義務は負いません。@NEMYの過失による不法行為によりユーザーに生じた損害の賠償は、当該損害が発生した月にユーザーが支払った寄付金を上限とします。<br><br>
                            ■紛争<br>
                            ユーザー間で紛争が生じた場合には、ユーザー間で解決を図るものとします。ユーザー間の紛争に関し、 @NEMYは一切責任を負いません。他のユーザー又は外部の第三者との間で紛争が生じた場合には、ユーザーは、 @NEMY及び関係者に対して、損害（認識の有無、疑惑の有無、開示の有無を問わず、当該紛争に起因し又は関連するあらゆる種類の全ての損害（実損害及び結果損害を含み）主張、要求を含みますが、これらに限られません。）を被らせないようにし、損害が生じた場合には全額補償することに同意します。@NEMYは、法的問題又は主張に関してはいかなる判断も行いません。
                            </p>
                          </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('新規登録') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
