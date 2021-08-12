<?php
return [
    //"DROP VIEW TST_5DTA.K_TABLCODA",
    "CREATE VIEW TST_5DTA.K_TABLCODA ( 
--  SQL1506   30   Key or attribute for K_TABLCODA in TST_5DTA ignored. 
	TA_COMP , 
	TA_CODETYP , 
	TA_BIRTH , 
	TA_LASTUPD , 
	TA_CODEVAL , 
	TA_CODEDS1 , 
	TA_CODEDS2 , 
	TA_CODEDS3 , 
	TA_CODEDS4 , 
	TA_CODEDS5 , 
	TA_FLAG1 , 
	TA_FLAG2 , 
	TA_FLAG3 , 
	TA_FLAG4 , 
	TA_FLAG5 , 
	TA_NUMBER1 , 
	TA_NUMBER2 , 
	TA_NUMBER3 , 
	TA_PROTECT , 
	TA_SEQUENC ) 
	AS 
	SELECT 
	TA_COMP , 
	TA_CODETYP , 
	TA_BIRTH , 
	TA_LASTUPD , 
	TA_CODEVAL , 
	TA_CODEDS1 , 
	TA_CODEDS2 , 
	TA_CODEDS3 , 
	TA_CODEDS4 , 
	TA_CODEDS5 , 
	TA_FLAG1 , 
	TA_FLAG2 , 
	TA_FLAG3 , 
	TA_FLAG4 , 
	TA_FLAG5 , 
	TA_NUMBER1 , 
	TA_NUMBER2 , 
	TA_NUMBER3 , 
	TA_PROTECT , 
	TA_SEQUENC   
	FROM TST_5DTA.K_TABLCOD 
	  
	RCDFMT RK_TABLCOD ",

"LABEL ON TABLE TST_5DTA.K_TABLCODA 
	IS 'Table of codes CODETYP, CODEVAL' ",

"LABEL ON COLUMN TST_5DTA.K_TABLCODA 
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

"LABEL ON COLUMN TST_5DTA.K_TABLCODA 
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

"GRANT ALTER , DELETE , INSERT , REFERENCES , SELECT , UPDATE   
ON TST_5DTA.K_TABLCODA TO PUBLIC WITH GRANT OPTION ",

"GRANT ALTER , DELETE , INSERT , REFERENCES , SELECT , UPDATE   
ON TST_5DTA.K_TABLCODA TO QSECOFR WITH GRANT OPTION ",

    "CREATE INDEX TST_5DTA.K_TABLCODA_QSQGNDDL_00001 ON TST_5DTA.K_TABLCOD ( TA_COMP ASC , TA_CODETYP ASC , TA_CODEVAL ASC )",
];