#!/bin/bash

HOME=$HOME/deploy
LOGPATH=$HOME/log
LOG=$LOGPATH/`date +%Y%m%d`
ERRORLOG=$LOGPATH/svn.error

SVN=svn
SVNPATH=${HOME}/svn
SVNAUTH="--username zhihui.wu --password ********** --config-dir ${SVNPATH}/.suversion "
SVNHOST=******

WEBPATH=/apps/web/
WEBUSER=****
WEBPASS=****

#是否需要初始化svn目录
is_init=0 
if [ ! -f "${SVNPATH}/installed" ]; then
    is_init=1
fi

if [ "$1" != "" ]; then
    if [ "$1" = "init" ]; then
        is_init=2
    fi
fi

if [  $is_init != 0  ]; then
    #init 初始化操作 是否安装svn 是否安装expect 安装证书 初始化目录 报错机制优化
    if [ ! -d $LOGPATH ]; then
        mkdir -p $LOGPATH && echo "mkdir ${LOGPATH}" 1>>$LOG || exit 0
    fi
    if [ ! -d $SVNPATH ]; then
        mkdir -p $SVNPATH && echo "mkdir ${SVNPATH}" 1>>$LOG || exit 0
    fi
	expect -c "
        set timeout 20
        spawn $SVN list $SVNAUTH $SVNHOST/zite
        expect {
            \"*ermanently*\" {send \"p\r\";exp_continue}
            \"*yes/no*\" {send \"no\r\";exp_continue}
            \"trunk\" {exit}
        }
        expect eof" > /$SVNPATH/svntool  #expect的错误无法记录
    rs=`cat /$SVNPATH/svntool | grep trunk`
    if [ "$rs" = "" ]; then 
        cat /tmp/svntool >> $ERRORLOG
        echo '0:install error'
        exit 1
    fi
    touch "${SVNPATH}/installed" 2>> $ERRORLOG
    
    if [ $is_init = 2 ]; then
        echo '1:install success'
        exit 0
    fi
fi

# "$1" = "init" $1为空会报错
#$rs 不加引号会报错
#echo ${RS%%/} 为什么去不掉
#shell 函数的定义方法，不需要function关键字
	
case "$1" in
	get_branches)
	    project=$2
	    $SVN ls $SVNAUTH --non-interactive $SVNHOST/$project/branches 2>>$ERRORLOG 
	    echo "trunk/"
		;;

	get_versions)
	    project=$2
	    branch=$3
	    if [ $branch != "trunk" ]; then
	         branch="branches/${branch}" 
	    fi
	    #echo $branch
	    $SVN log $SVNAUTH --non-interactive -l 10 --incremental --xml $SVNHOST/$project/$branch 2>>$ERRORLOG
		;;

	update_code)
	    # sh /svn/young001/tool/update/svntool.sh update_code ziwww trunk
	    project=$2
	    branch=$3  #非空
	    version=$4
	    server=$5
	    domain=$6
	    type=$7   #强制更新
	    if [ $branch != "trunk" ]; then
	         branch="branches/${branch}" 
	    fi
	    
	    #更新代码的并发处理
	    #echo "ps -ef | grep $SVNPATH/$project/$branch | grep -v grep"
	    #echo "ps -ef | grep $SVNPATH/$project/$branch | grep -v grep | awk '{print $2}' | head -n 1"
	    #ps -ef | grep $SVNPATH/$project/$branch | grep -v grep
	    
	    is_updating=`ps -ef | grep $SVNPATH/$project/$branch | grep -v grep | awk '{print $2}' | head -n 1` 
	    if [ "$is_updating" != "" ]; then
	        #非强制更新，退出进程
	        if [ "$type" = "" ]; then
	            echo "2:is_updating ${is_updating}"
	            exit;
	        fi
	        
	        #强制更新，kill掉进程
            ps -ef | grep $SVNPATH/$project/$branch | grep -v grep | awk '{print $2}' | sort -r | sudo xargs kill -9 2>>$ERRORLOG
            
            #校验 如果还有强制退出
            #ps -ef | grep $SVNPATH/$project/$branch | grep -v grep
	    fi
	    
	    #强制更新 初始化目录
        if [ "$type" != "" ]; then
            rm -rf $SVNPATH/$project/$branch 2>>$ERRORLOG
        fi
	    
	    #更新代码
	    if [ ! -d $SVNPATH/$project/$branch/.svn ]; then
	        mkdir -p $SVNPATH/$project/$branch 2>>$ERRORLOG
		    svn co $SVNAUTH -r $version --non-interactive $SVNHOST/$project/$branch $SVNPATH/$project/$branch 1>/dev/null 2>>$ERRORLOG #| tail -n 1
		else
		    svn up $SVNAUTH -r $version --non-interactive $SVNPATH/$project/$branch 1>/dev/null 2>>$ERRORLOG #| tail -n 1
		fi
		
		#打软链接
		if [ "$project" = "zistatic" ]; then
		    if [ ! -d $SVNPATH/$project/$branch/css/public ]; then
		        cd $SVNPATH/$project/$branch/css
		        ln -sf  ../css public
            fi
            if [ ! -d $SVNPATH/$project/$branch/js/public ]; then
		        cd $SVNPATH/$project/$branch/js
		        ln -sf ../js public
            fi
        fi
        
        #同步代码
		expect -c "
		    set timeout 20
            spawn rsync -azv --exclude .svn --exclude runtime --exclude web_file --delete $SVNPATH/$project/$branch/ ${WEBUSER}@${server}:$WEBPATH/$domain/
            expect {
                \"*yes/no*\" {send \"yes\r\";exp_continue}
                \"*password*\" {send \"${WEBPASS}\r\";}
            }
            expect eof;"
		;;

	*)
		echo "Usage: $NAME {init|update_code|get_branches|get_versions}" >&2
		exit 1
		;;
esac

exit 0
