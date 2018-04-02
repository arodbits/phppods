<?php

require 'vendor/autoload.php';

\Axonbits\Filesystem::
    newFile(__DIR__ . '/tmp/SessionClass.php')
    ->withStub($stubPath = __DIR__ . '/tmp/DummyClass.php', [
        'DummyClass'     => 'SessionClass',
        'DummyTimestamp' => '"2018-01-01"',
        'DummyNamespace' => 'App\\Sessions',
    ])
    ->write();
