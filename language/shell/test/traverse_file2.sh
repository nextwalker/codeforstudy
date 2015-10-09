#!/bin/bash
function ergodic(){
        for file in ` ls $1 `
        do
                if [ -d $1"/"$file ]
                then
                        ergodic $1"/"$file
                else
                        echo $1"/"$file >> b
                fi
        done
}
INIT_PATH="/etc/httpd"
ergodic $INIT_PATH
