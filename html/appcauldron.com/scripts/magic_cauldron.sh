#!/bin/bash

generatedfolder=/var/www/html/appcauldron.com/generatedfiles
templatesfolder=/var/www/html/appcauldron.com/templates
ingredientes=$generatedfolder/ingredientes.txt
servicios=$generatedfolder/servicios.txt
spell=$generatedfolder/spell.yaml
grimoire=$generatedfolder/grimoire.txt

echo "services:" > $spell
rm $grimoire
touch $grimoire

while IFS= read -r ingrediente; do
	if [ "$ingrediente" == "bbdd" ] ; then
	apartadovolumes=1;
	cat $templatesfolder/database >> $spell
	echo "" >> $spell
	cat $templatesfolder/database.info >> $grimoire
	echo "" >> $grimoire
	fi
	if [ "$ingrediente" == "nginx" ] ; then
	cat $templatesfolder/nginx >> $spell
	echo "" >> $spell
	cat $templatesfolder/nginx.info >> $grimoire
	echo "" >> $grimoire
	fi
	if [ "$ingrediente" == "ftp" ] ; then
	cat $templatesfolder/ftp >> $spell
	echo "" >> $spell
	cat $templatesfolder/ftp.info >> $grimoire
	echo "" >> $grimoire
	fi
        if [ "$ingrediente" == "netdata" ] ; then
        apartadovolumes=1;
        cat $templatesfolder/netdata >> $spell
        echo "" >> $spell
        cat $templatesfolder/netdata.info >> $grimoire
        echo "" >> $grimoire
        fi
        if [ "$ingrediente" == "lms" ] ; then
        apartadovolumes=1;
        cat $templatesfolder/lms >> $spell
        echo "" >> $spell
        cat $templatesfolder/lms.info >> $grimoire
        echo "" >> $grimoire
        fi
        if [ "$ingrediente" == "video" ] ; then
        cat $templatesfolder/jitsi >> $spell
        echo "" >> $spell
        cat $templatesfolder/jitsi.info >> $grimoire
        echo "" >> $grimoire
        fi
        if [ "$ingrediente" == "wordpress" ] ; then
        apartadovolumes=1;
        cat $templatesfolder/wordpress >> $spell
        echo "" >> $spell
        cat $templatesfolder/wordpress.info >> $grimoire
        echo "" >> $grimoire
        fi
        if [ "$ingrediente" == "office" ] ; then
        cat $templatesfolder/office >> $spell
        echo "" >> $spell
        cat $templatesfolder/office.info >> $grimoire
        echo "" >> $grimoire
        fi
done < $servicios

if [ "$apartadovolumes" == "1" ] ; then
	echo "volumes:" >> $spell
fi

while IFS= read -r ingrediente; do
	if [ "$ingrediente" == "bbdd" ] ; then
        cat $templatesfolder/database.volumes >> $spell
        echo "" >> $spell
	fi
        if [ "$ingrediente" == "netdata" ] ; then
        cat $templatesfolder/netdata.volumes >> $spell
        echo "" >> $spell
        fi
        if [ "$ingrediente" == "lms" ] ; then
        cat $templatesfolder/lms.volumes >> $spell
        echo "" >> $spell
        fi
        if [ "$ingrediente" == "wordpress" ] ; then
        cat $templatesfolder/wordpress.volumes >> $spell
        echo "" >> $spell
        fi
done < $servicios

echo "networks:" >> $spell
echo "    network:" >> $spell

rm $ingredientes
rm $servicios
