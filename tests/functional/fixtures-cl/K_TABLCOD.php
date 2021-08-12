<?php
return [
    "DROP TABLE TST_5DTA.K_TABLCOD",
    "CREATE TABLE TST_5DTA.K_TABLCOD ( 
--  SQL150B   10   REUSEDLT(*NO) in table K_TABLCOD in TST_5DTA ignored. 
	TA_COMP CHAR(1) CCSID 37 NOT NULL DEFAULT '' , 
	TA_CODETYP CHAR(3) CCSID 37 NOT NULL DEFAULT '' , 
	TA_BIRTH DATE NOT NULL DEFAULT CURRENT_DATE , 
	TA_LASTUPD DATE NOT NULL DEFAULT CURRENT_DATE , 
	TA_CODEVAL CHAR(20) CCSID 37 NOT NULL DEFAULT '' , 
	TA_CODEDS1 CHAR(100) CCSID 37 NOT NULL DEFAULT '' , 
	TA_CODEDS2 CHAR(100) CCSID 37 NOT NULL DEFAULT '' , 
	TA_CODEDS3 CHAR(100) CCSID 37 NOT NULL DEFAULT '' , 
	TA_CODEDS4 CHAR(100) CCSID 37 NOT NULL DEFAULT '' , 
	TA_CODEDS5 CHAR(100) CCSID 37 NOT NULL DEFAULT '' , 
	TA_FLAG1 DECIMAL(1, 0) NOT NULL DEFAULT 0 , 
	TA_FLAG2 DECIMAL(1, 0) NOT NULL DEFAULT 0 , 
	TA_FLAG3 DECIMAL(1, 0) NOT NULL DEFAULT 0 , 
	TA_FLAG4 DECIMAL(1, 0) NOT NULL DEFAULT 0 , 
	TA_FLAG5 DECIMAL(1, 0) NOT NULL DEFAULT 0 , 
	TA_NUMBER1 DECIMAL(5, 0) NOT NULL DEFAULT 0 , 
	TA_NUMBER2 DECIMAL(7, 2) NOT NULL DEFAULT 0 , 
	TA_NUMBER3 DECIMAL(11, 4) NOT NULL DEFAULT 0 , 
	TA_PROTECT DECIMAL(1, 0) NOT NULL DEFAULT 0 , 
	TA_SEQUENC CHAR(3) CCSID 37 NOT NULL DEFAULT '' )   
	  
	RCDFMT RK_TABLCOD ",
    "LABEL ON TABLE TST_5DTA.K_TABLCOD 
	IS 'Table of codes                                  TA' ",
  
"LABEL ON COLUMN TST_5DTA.K_TABLCOD 
( TA_COMP IS 'Company             ID' , 
	TA_CODETYP IS 'Code                type' , 
	TA_BIRTH IS 'Code                birth               date' , 
	TA_LASTUPD IS 'Code                last                update' , 
	TA_CODEVAL IS 'Code                value' , 
	TA_CODEDS1 IS 'Code                description         1' , 
	TA_CODEDS2 IS 'Code                description         2' , 
	TA_CODEDS3 IS 'Code                description         3' , 
	TA_CODEDS4 IS 'Code                description         4' , 
	TA_CODEDS5 IS 'Code                description         5' , 
	TA_FLAG1 IS 'Code                flag                1' , 
	TA_FLAG2 IS 'Code                flag                2' , 
	TA_FLAG3 IS 'Code                flag                3' , 
	TA_FLAG4 IS 'Code                flag                4' , 
	TA_FLAG5 IS 'Code                flag                5' , 
	TA_NUMBER1 IS 'Number              1' , 
	TA_NUMBER2 IS 'Number              2' , 
	TA_NUMBER3 IS 'Number              3' , 
	TA_PROTECT IS 'Protect             record              flag' , 
	TA_SEQUENC IS 'Record              sequence' ) ",
  
"LABEL ON COLUMN TST_5DTA.K_TABLCOD 
( TA_COMP TEXT IS 'Company ID' , 
	TA_CODETYP TEXT IS 'Code type' , 
	TA_BIRTH TEXT IS 'Code birth date' , 
	TA_LASTUPD TEXT IS 'Code last update' , 
	TA_CODEVAL TEXT IS 'Code value' , 
	TA_CODEDS1 TEXT IS 'Code description 1' , 
	TA_CODEDS2 TEXT IS 'Code description 2' , 
	TA_CODEDS3 TEXT IS 'Code description 3' , 
	TA_CODEDS4 TEXT IS 'Code description 4' , 
	TA_CODEDS5 TEXT IS 'Code description 5' , 
	TA_FLAG1 TEXT IS 'Code flag 1' , 
	TA_FLAG2 TEXT IS 'Code flag 2' , 
	TA_FLAG3 TEXT IS 'Code flag 3' , 
	TA_FLAG4 TEXT IS 'Code flag 4' , 
	TA_FLAG5 TEXT IS 'Code flag 5' , 
	TA_NUMBER1 TEXT IS 'Number 1' , 
	TA_NUMBER2 TEXT IS 'Number 2' , 
	TA_NUMBER3 TEXT IS 'Number 3' , 
	TA_PROTECT TEXT IS 'Protect record flag' , 
	TA_SEQUENC TEXT IS 'Record sequence' ) ",

"GRANT ALTER , DELETE , INDEX , INSERT , REFERENCES , SELECT , UPDATE   
ON TST_5DTA.K_TABLCOD TO PUBLIC WITH GRANT OPTION ",
  
"GRANT ALTER , DELETE , INDEX , INSERT , REFERENCES , SELECT , UPDATE   
ON TST_5DTA.K_TABLCOD TO QSECOFR WITH GRANT OPTION ",

    "INSERT INTO TST_5DTA.K_TABLCOD SELECT * FROM WEB_5DTA.K_TABLCOD"
];