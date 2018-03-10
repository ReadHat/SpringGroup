#!/bin/bash
########################################
## Script for setting up site         ##
##+(adopted from another site I made) ##
########################################

#NOTE: This does not work with backquotes. Why???
#ALSO!: escapes are double-encoded here
root_dir=$(pwd | sed 's/\//\\\//g')

## evaluates command-line arguments
function evalArgs()
{
	case $1 in
		-h)
			echo 'syntax: ./setup [ --set-root <root-dir> | -h ]'
			exit 0
			;;
		--set-root)
			if [ $# -lt 2 ]
			then
				echo 'ERROR! no directory specified'
				exit 1
			fi

			#else
			root_dir=$(echo $2 | grep -Poi '.*[^/](?=/*$)' | sed 's/\//\\\//g')
			;;
		*)
			echo 'ERROR! invalid option(s)'
			exit 1
			;;
	esac
}

## sets path variable in main-include file
function setPath()
{
	if [ ! -f patch/main_include-TEMPLATE.php ]
	then
		echo 'ERROR! main_include-TEMPLATE.php not found!'
	fi

	# else:
	cp patch/main_include-TEMPLATE.php ./main_include.php

	sed_string=`echo 's/\$PATH_\s*=\s*"\s*"/\$PATH_="'$root_dir'"/g'`

	sed -i $sed_string main_include.php
}

##########
## Main ##
##########

if [ $# -eq 0 ]
then
	setPath
elif [ ! $# -lt 3 ]
then
	echo 'ERROR! too many arguments'
	exit 1
else
	evalArgs $@
	setPath
fi
