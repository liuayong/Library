#!/bin/sh


_S_DIR="/data/www/hlzb/"
_D_DIR="/data/deploy/www.honlinecapital.com/"
_D_IP="120.27.166.102"
_D_PORT="13822"


if [ "$1" == run ]
then
        RARG=""
else
        RARG="-n"
fi



echo "sync exclude  .svn config.php"
rsync  ${RARG}   -av -e "ssh -p ${_D_PORT}"  --exclude=*\.svn  \
--exclude=/Application/Common/Conf/config.php \
--exclude=/Application/Runtime/* \
--exclude=/ThinkPHP/Runtime/* \
--exclude=/Uploads/* \
--exclude=/UploadsTemp/* \
--exclude=/index.php \
 ${_S_DIR}/*  ${_D_IP}:${_D_DIR}/



#echo "tar www.hlzb ...."
#tar czf www.hlzb.`date +%F`.tar.gz www.hlzb
