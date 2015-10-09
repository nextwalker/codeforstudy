#!/bin/sh
foreachd(){
	for file in $1/*
	do
		if [ -d $file ] 
		then
			echo $file;
			foreachd $file;
		elif [ -f $file ]
		then
			echo $file
		fi
	done
}

if [ $1 > 0 ] 
then
	foreachd "$1"
else
	foreachd "."
fi
