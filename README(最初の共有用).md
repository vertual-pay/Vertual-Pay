# Vertual-Pay
案件。共有用。自分でクローンしてください。
# X-Server情報
会員ID
phg68922
インフォパネルパスワード 
71ijb52n
# SSHログイン情報
.sshディレクトリに入る。
```
 ssh -l nemypay -i id_xserver_rsa nemypay.xsrv.jp -p 10022
```

Pwd kurata1998

User sv6139

Password nemypay2018

# Github連携
```
git init
git remote add origin https://github.com/vertual-pay/Vertual-Pay.git
echo "アカウント名" >> contributors.txt
git add contributors.txt
git commit -m "first commit"
git push -u origin master
```
# Route設定

サイトトップ→get /
ユーザー用新規登録 post /register
送信完了画面 get /maildone
パスワード設定  post /edit/:id
ログイン post /login 
忘れた場合  post  /loginforget
利用規約 get  /rule  

メインページ get /main/:id
会計 get /main/:id/balance 
設定　update /main/:id/config
その他　get /main/:id/




