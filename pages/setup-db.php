<?php

$setup = file_get_contents(dirname(__DIR__) . '/config/db.sql');

$message = "Nada para ser atualizado na base.";
if ($connection->exec($setup)) {
    $message = "Base atualizada";
}
echo $message;