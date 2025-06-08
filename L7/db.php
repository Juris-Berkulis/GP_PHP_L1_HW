<?php
return new PDO('sqlite:L7/database.db', null, null, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);
