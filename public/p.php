<?php

    require '../vendor/autoload.php';

    Geekality\CrossOriginProxy::proxy([
        ['regex' => '%^https://www.cbar.az/currencies%'],
    ]);