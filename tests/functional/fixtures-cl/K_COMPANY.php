<?php
return [
    "DROP TABLE TST_5DTA.K_COMPANY",
    "CL: CRTDUPOBJ *OBJ(K_COMPANY) FROMLIB(WEB_5DTA) OBJTYPE(*FILE) TOLIB(TST_5DTA) NEWOBJ(K_COMPANY) DATA(*YES) FILEID(*YES)",

    "INSERT INTO TST_5DTA.K_COMPANY SELECT * FROM WEB_5DTA.K_COMPANY",
];