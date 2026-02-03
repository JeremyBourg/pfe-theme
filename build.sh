#!/usr/bin/env bash

DIR="$(dirname "$(realpath "$0")")"

cd $DIR || exit

if ! [ -d "dist" ]; then
	echo "dist does not exist"
	exit 1
fi

REMOTE_THEME_DIR="/public_html/pfe/constructeur/wp-content/themes/"

SET_LFTP_OPTS="set ftp:ssl-allow yes; set ssl:verify-certificate no;"

if [[ $# -gt 0 ]]; then
	if [ -d "$1" ]; then
		THEME="$1"
	else
		echo "Invalid directory specified"
		exit 1
	fi
else
	echo "Missing argument"
	exit 1
fi

# set these variables manually
# export USERNAME=<user@jbourg.dectim.ca>
# export PASSWORD=<password>

if ! diff -qr "dist" "parent/dist" &>/dev/null; then
	echo "changes made to dist"
	rm -rf "parent/dist"
	cp -pr "dist/" "parent"
	if [[ -n $USERNAME && -n $PASSWORD ]]; then
		if [[ $THEME -eq "parent" ]]; then
			lftp -u $USERNAME,$PASSWORD -e \
				"${SET_LFTP_OPTS} mirror -R --verbose $THEME $REMOTE_THEME_DIR/; bye;" -p 21 ftp://ftp.dectim.ca
		else
			lftp -u $USERNAME,$PASSWORD -e \
				"${SET_LFTP_OPTS} mirror -R --verbose parent $REMOTE_THEME_DIR/ --exclude dist/styles; bye;" -p 21 ftp://ftp.dectim.ca
		fi
		exit 0
	else
		if [[ -z $USERNAME ]]; then
			echo "ERROR: USERNAME envvar not set, not updating remote server"
		fi
		if [[ -z $PASSWORD ]]; then
			echo "ERROR: PASSWORD envvar not set, not updating remote server"
		fi
		exit 1
	fi
fi

echo "updating $THEME..."
if [[ -n $USERNAME && -n $PASSWORD ]]; then
	lftp -u $USERNAME,$PASSWORD -e \
		"${SET_LFTP_OPTS} mirror -R --verbose $THEME $REMOTE_THEME_DIR/ --exclude dist; bye;" -p 21 ftp://ftp.dectim.ca
else
	if [[ -z $USERNAME ]]; then
		echo "ERROR: USERNAME envvar not set, not updating remote server"
	fi
	if [[ -z $PASSWORD ]]; then
		echo "ERROR: PASSWORD envvar not set, not updating remote server"
	fi
	exit 1
fi
