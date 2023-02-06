#!/bin/sh
# 第1引数をIPアドレス,第2引数を処理回数,第3引数をファイル名にしている
touch $3 
echo '実験開始' > $3 #txtのファイルの初期化 
for i in `seq 1 $2` 
do 
   echo $1 >> $3
   echo $i'回目の実行結果' >> $3 
   ./iperf -c $1 $4 $5   >> $3 #実行結果をtxtに出力
   echo '' >> $3
done
echo '実験終了' >> $3 


