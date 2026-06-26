<?php

function createFileIfNotExists($file,$default)
{

    if(!file_exists($file))
    {

        file_put_contents(
            $file,
            json_encode(
                $default,
                JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
            )
        );

    }

}

function loadJson($file,$default=[])
{

    createFileIfNotExists($file,$default);

    $json=file_get_contents($file);

    $data=json_decode($json,true);

    if(!is_array($data))
    {
        return $default;
    }

    return array_merge($default,$data);

}

function saveJson($file,$data)
{

    file_put_contents(

        $file,

        json_encode(

            $data,

            JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE

        )

    );

}