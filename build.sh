#!/usr/bin/env bash

DIR="$(dirname "$(realpath "$0")")"

cd $DIR || exit

if ! [ -d "dist" ]; then
	echo "dist does not exist"
	exit 1
fi

if [ -e ".env" ]; then
	source .env
fi

REMOTE_THEME_DIR="/public_html/pfe/constructeur/wp-content/themes/"

SET_LFTP_OPTS="set ftp:ssl-allow yes; set ssl:verify-certificate no;"

themes=("parent" "enfant1" "enfant2")
if [[ $# -gt 0 ]]; then
	if [ -d "$1" ]; then
		themes=("$1")
	else
		echo "Invalid directory specified"
		exit 1
	fi
fi

# set these variables manually
# export USERNAME=<user@jbourg.dectim.ca>
# export PASSWORD=<password>
if [[ -n $USERNAME && -n $PASSWORD ]]; then
	:
else
	if [[ -z $USERNAME ]]; then
		echo "ERROR: USERNAME envvar not set, not updating remote server"
	fi
	if [[ -z $PASSWORD ]]; then
		echo "ERROR: PASSWORD envvar not set, not updating remote server"
	fi
	exit 1
fi

if ! diff -qr "dist" "parent/dist" &>/dev/null; then
	echo "changes made to dist"
	rm -rf "parent/dist"
	cp -pr "dist/" "parent"
		lftp -u $USERNAME,$PASSWORD -e \
			"${SET_LFTP_OPTS} mirror -R --verbose parent $REMOTE_THEME_DIR/; bye;" -p 21 ftp://ftp.dectim.ca
		exit 0
fi

for theme in ${themes[@]}; do
	lftp -u $USERNAME,$PASSWORD -e \
		"${SET_LFTP_OPTS} mirror -R --verbose --delete $theme $REMOTE_THEME_DIR/ --exclude dist; bye;" -p 21 ftp://ftp.dectim.ca
	if [[ -z $USERNAME ]]; then
		echo "ERROR: USERNAME envvar not set, not updating remote server"
	fi
	if [[ -z $PASSWORD ]]; then
		echo "ERROR: PASSWORD envvar not set, not updating remote server"
	fi
	exit 1
done
