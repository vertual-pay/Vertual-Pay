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
cd ~/.ssh
```
鍵をコマンドする
```
 ssh -l nemypay -i authorized.key nemypay.xsrv.jp -p 10022
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

#X-serverでのgit pull 
cd ~
cd develop 
cd Vertual-Pay
git init 
git remote add origin https://github.com/vertual-pay/Vertual-Pay.git
(もしかしたら、already exitsになるかもしれない。そしたら飛ばす)
git pull origin master

::::
Sccess fullyとでたらおk

# Route設定
/ 
