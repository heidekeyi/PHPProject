<?php

namespace api;

include_once '../back/CAutoLoad.php';
\CAutoLoad\CAutoLoad::register();

use CRouter\CRouter;

echo json_encode(CRouter::execute());