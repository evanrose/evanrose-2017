#!/bin/bash
#
#
#
URL="http://www.zoza.com/index.jhtml"
STRING="Behind Zoza"
MESSAGE="zoza.com down"
SUBJECT="Monitor: zoza.com down"
mailto="caseyd@mail.zoza.com.criticalpath.net,caseyd@well.com,casey@meer.net,earose@hotmail.com,Patrick.Borg@XUMA.com"
BROWSER="/usr/bin/lynx"
mail="/bin/mail"

if [ `/usr/bin/lynx -dump http://63.211.138.50 | grep -c -i zozazine 2>&1` -eq 0 ]
then 
echo "Zoza.com is apparently down. Please test and if need be call Xuma 911." | ${mail} -s "Site Monitor(he): Zoza.com DOWN" ${mailto}
fi
