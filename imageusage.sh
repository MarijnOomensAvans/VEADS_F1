#!/bin/bash

cd ./public/images
for image in *; do
    echo "$image"

    grep -r "$image" ../../resources/views/

    if [[ $? -eq 1 ]]; then
        echo "Delete image $image"

        rm "$image"
    fi
done