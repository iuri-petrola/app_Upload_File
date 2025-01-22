
![example workflow](https://github.com/iuri-petrola/app_Upload_File/actions/workflows/Build App.yaml/badge.svg)


# app_Upload_File
Teste de upload em volume NFS fileStore



# Testando no Docker

# Criar rede TestVolumes

    docker network create --subnet=10.0.1.0/24 --gateway 10.0.1.1 testvolumes


# Iniciar container BD-Postgres




# Iniciar container App
    docker run -itd --name apptestvolume --net testvolumes \
    --restart unless-stopped  -p 80:80 \
    --mount type=bind,source=/etc/hosts,target=/etc/hosts \
    --mount type=bind,source=/mnt/filestore/uploads/,target=/mnt/uploads iuripetrola/app_upload_file:1.1.0
