<?php

function getContent(string $key, string $default = null) {
    $content = \App\EditContent::where('key', $key)->first();

    if (empty($content)) {
        return $default;
    }

    if ($content->type == 'image') {
        return \App\Picture::find($content->content);
    }

    return $content;
}
