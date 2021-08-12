<?php
declare(strict_types=1);

namespace OrderFunctionalTest;

use ApplicationIntegrationTest\Bootstrap;
use Laminas\ServiceManager\ServiceManager;
use PHPUnit\Framework\TestCase;
use ToolkitApi\Toolkit;
use ToolkitApi\ToolkitInterface;

final class IGNORDRTest extends TestCase
{
    /**
     * @var \Interop\Container\ContainerInterface|ServiceManager
     */
    private $container;

    /**
     * @var ToolkitInterface|Toolkit
     */
    private $toolkit;

    /**
     * @var array
     */
    private $k3sConfig;

    public function setUp(): void
    {
        $this->container = Bootstrap::getContainer();
        $this->toolkit = $this->container->get(Toolkit::class);
        $this->k3sConfig = $this->container->get('config')['k3s_settings'];


        Bootstrap::executeSql("DELETE FROM TST_5DTA.K_COMPANY");
        $sql = "INSERT INTO tst_5dta.K_COMPANY (CM_COMP, CM_COMPCOD, CM_CMPNAME, CM_DATFMT, CM_TIMFMT, CM_SYSDATE, CM_BIRTH, CM_LASTUPD, CM_DEMHI, CM_DEMLO, CM_SMFACTR, CM_REPCARY, CM_FBCARRY, CM_TSLIMIT, CM_SERVICE, CM_HEADCST, CM_LINECST, CM_LASTPO, CM_LASTDL, CM_LASTPR, CM_LASTBA, CM_SLOW, CM_FACTPI, CM_FACTDSC, CM_FACTDAT, CM_FACTALT, CM_FBFILTR, CM_FBMAX, CM_ALTADV, CM_ALTMAXP, CM_ALTMAXD, CM_ALTMINQ, CM_ALTMIN$, CM_ALTINVS, CM_INTRATE, CM_FBFLAG, CM_BRKOTHR, CM_DELTLMT, CM_PROBDAY, CM_DWINDOW, CM_VLDISCT, CM_VLPINCR, CM_VLDATNG, CM_OVRDAYS, CM_OVRDOLR, CM_OVRDISC, CM_OVRMANL, CM_OVRCARY, CM_SWALLOW, CM_DAYSUSD, CM_DAYSP12, CM_DAYSP13, CM_DAYSP52, CM_DAILY, CM_FORDEVP, CM_NODEVP, CM_LEADTMV, CM_PROCESS, CM_BUYRBAD, CM_DEALEXP, CM_CONVPKP, CM_DSPTOT1, CM_DSPTOT2, CM_SZHILO, CM_SZSENS, CM_SZMA12, CM_SZMA13, CM_OVRHEAD, CM_TRMPROD, CM_FORMETH, CM_INVMETH, CM_REPTDAT, CM_REPTTIM, CM_RETURN, CM_APPROVE, CM_EXITCHK, CM_SCHEMLT, CM_USEBMLT, CM_AVGZERO, CM_OVERCST, CM_LTMUSE, CM_PURDISC, CM_RNDDISC, CM_RPLZERO, CM_ALTSRND, CM_PRDGRP1, CM_PRDGRP2, CM_PRDGRP3, CM_PRDGRP4, CM_PRDGRP5, CM_SEASEXC, CM_EXTALTR, CM_NEGSALE, CM_NOTEKEY ) " .
            "VALUES ('C', 'ACS', 'ACS Development world', '*USA', '*HMS', '2021-08-11', '2016-02-24', '2021-08-11', 5, 3, .10, 22.0, 40.0, .55, 98.0, 25.00, .50, 9850000, 19, 12647, 15072, 50, 100, 100, 100, 50, 90, 120, 6.0, 65.0, 15, 12, 50, 25.0, 2.5, 1, 'Other...', 7, 90, 5, 5.00, 4.75, 30.0, 90, 500, 1, 0, 40.0, 1, 0, 22, 20, 5, 1, 20.0, 20.0, 20.0, 1, '999', 90, 70.0, 2, 5, 1.50, .50, .500, .420, .0, 1, 0, 0, '*USA', '*HMS', 17.0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
        Bootstrap::executeSql($sql);

        // Delete views
        $this->toolkit->CLCommand('DLTF FILE(TST_5DTA/K_COMPANYA)');
        $this->toolkit->CLCommand('DLTF FILE(TST_5DTA/K_TABLCODA)');
        $this->toolkit->CLCommand('DLTF FILE(TST_5DTA/K_USERPRFA)');

        // Delete tables
        $this->toolkit->CLCommand('DLTF FILE(TST_5DTA/K_TABLCOD)');
        $this->toolkit->CLCommand('DLTF FILE(TST_5DTA/K_COMPANY)');
        $this->toolkit->CLCommand('DLTF FILE(TST_5DTA/K_USERPRF)');
        $this->toolkit->CLCommand('DLTF FILE(TST_5DTA/K_LOCATNS)');
        $this->toolkit->CLCommand('DLTF FILE(TST_5DTA/K_INTORDB');
        $this->toolkit->CLCommand('DLTF FILE(TST_5DTA/K_INTORDL');

        // Copy tables
        $this->toolkit->CLCommand('CRTDUPOBJ OBJ(K_TABLCOD) FROMLIB(WEB_5DTA) OBJTYPE(*FILE) TOLIB(TST_5DTA) NEWOBJ(K_TABLCOD) DATA(*YES) FILEID(*YES)');
        $this->toolkit->CLCommand('CRTDUPOBJ OBJ(K_COMPANY) FROMLIB(WEB_5DTA) OBJTYPE(*FILE) TOLIB(TST_5DTA) NEWOBJ(K_COMPANY) DATA(*YES) FILEID(*YES)');
        $this->toolkit->CLCommand('CRTDUPOBJ OBJ(K_USERPRF) FROMLIB(WEB_5DTA) OBJTYPE(*FILE) TOLIB(TST_5DTA) NEWOBJ(K_USERPRF) DATA(*YES) FILEID(*YES)');
        $this->toolkit->CLCommand('CRTDUPOBJ OBJ(K_LOCATNS) FROMLIB(WEB_5DTA) OBJTYPE(*FILE) TOLIB(TST_5DTA) NEWOBJ(K_LOCATNS) DATA(*YES) FILEID(*YES)');
        $this->toolkit->CLCommand('CRTDUPOBJ OBJ(K_INTORDB) FROMLIB(WEB_5DTA) OBJTYPE(*FILE) TOLIB(TST_5DTA) NEWOBJ(K_INTORDB) DATA(*YES) FILEID(*YES)');
        $this->toolkit->CLCommand('CRTDUPOBJ OBJ(K_INTORDL) FROMLIB(WEB_5DTA) OBJTYPE(*FILE) TOLIB(TST_5DTA) NEWOBJ(K_INTORDL) DATA(*YES) FILEID(*YES)');

        // Copy views
        $this->toolkit->CLCommand('CRTDUPOBJ OBJ(K_TABLCODA) FROMLIB(WEB_5DTA) OBJTYPE(*FILE) TOLIB(TST_5DTA) NEWOBJ(K_TABLCODA) DATA(*YES) FILEID(*YES)');
        $this->toolkit->CLCommand('CRTDUPOBJ OBJ(K_COMPANYA) FROMLIB(WEB_5DTA) OBJTYPE(*FILE) TOLIB(TST_5DTA) NEWOBJ(K_COMPANYA) DATA(*YES) FILEID(*YES)');
        $this->toolkit->CLCommand('CRTDUPOBJ OBJ(K_USERPRFA) FROMLIB(WEB_5DTA) OBJTYPE(*FILE) TOLIB(TST_5DTA) NEWOBJ(K_USERPRFA) DATA(*YES) FILEID(*YES)');

        //Bootstrap::executeSqlArray(require __DIR__ . '/../fixtures/K_COMPANY.php');
        //Bootstrap::executeSqlArray(require __DIR__ . '/../fixtures/K_TABLCOD.php');
        //Bootstrap::executeSqlArray(require __DIR__ . '/../fixtures/K_COMPANYA.php');
        //Bootstrap::executeSqlArray(require __DIR__ . '/../fixtures/K_TABLCODA.php');
        //Bootstrap::executeSqlArray(require __DIR__ . '/../fixtures/K_USERPRF.php');
        //Bootstrap::executeSqlArray(require __DIR__ . '/../fixtures/K_USERPRFA.php');
    }

    public function testValidatesCompany()
    {
        $location = '01';
        $purchaseOrderNumber = '12345';

        $result = $this->toolkit->pgmCall('AC_IGNORDR', 'ACS_5OBJ', [
            $this->toolkit->AddParameterChar('BOTH', 10,  'K3S Object library',       'K3SOBJ',   $this->k3sConfig['k3sobj']),
            $this->toolkit->AddParameterChar('BOTH', 1,   'Company',                  'COMP',     '0'),
            $this->toolkit->AddParameterChar('BOTH', 3,   'Company code',             'COMPCOD',  $this->k3sConfig['compcod']),
            $this->toolkit->AddParameterChar('BOTH', 10,  'User calling the program', 'USER',     $this->k3sConfig['user']),
            $this->toolkit->AddParameterChar('BOTH', 1,   'Error indicator',          'ERRORS',   null),
            $this->toolkit->AddParameterChar('BOTH', 100, 'Error message',            'ERRMSG',   null),
            $this->toolkit->AddParameterChar('BOTH', 20,  'Field in error',           'ERRFIELD', null),
            $this->toolkit->AddParameterChar('BOTH', 5,   'Location',                 'IDLOCN',   '01'),
            $this->toolkit->AddParameterChar('BOTH', 10,  'Purchase Order Number',    'IDPON',    '12345')
        ]);

        $this->assertEquals($result['io_param']['ERRORS'], '1');
        $this->assertEquals($result['io_param']['ERRMSG'], 'Company value invalid');
        $this->assertEquals($result['io_param']['ERRFIELD'], 'comp');
    }

    public function testValidatesLocation()
    {
        $result = $this->toolkit->pgmCall('AC_IGNORDR', 'ACS_5OBJ', [
            $this->toolkit->AddParameterChar('BOTH', 10,  'K3S Object library',       'K3SOBJ',   $this->k3sConfig['k3sobj']),
            $this->toolkit->AddParameterChar('BOTH', 1,   'Company',                  'COMP',     'C'),
            $this->toolkit->AddParameterChar('BOTH', 3,   'Company code',             'COMPCOD',  $this->k3sConfig['compcod']),
            $this->toolkit->AddParameterChar('BOTH', 10,  'User calling the program', 'USER',     $this->k3sConfig['user']),
            $this->toolkit->AddParameterChar('BOTH', 1,   'Error indicator',          'ERRORS',   null),
            $this->toolkit->AddParameterChar('BOTH', 100, 'Error message',            'ERRMSG',   null),
            $this->toolkit->AddParameterChar('BOTH', 20,  'Field in error',           'ERRFIELD', null),
            $this->toolkit->AddParameterChar('BOTH', 5,   'Location',                 'IDLOCN',   '99'),
            $this->toolkit->AddParameterChar('BOTH', 10,  'Purchase Order Number',    'IDPON',    '12345')
        ]);

        $this->assertEquals($result['io_param']['ERRORS'], '1');
        $this->assertEquals($result['io_param']['ERRMSG'], 'Location value invalid');
        $this->assertEquals($result['io_param']['ERRFIELD'], 'idlocn');
    }

    public function testValidatesPurchaseOrderNumber()
    {
        $result = $this->toolkit->pgmCall('AC_IGNORDR', 'ACS_5OBJ', [
            $this->toolkit->AddParameterChar('BOTH', 10,  'K3S Object library',       'K3SOBJ',   $this->k3sConfig['k3sobj']),
            $this->toolkit->AddParameterChar('BOTH', 1,   'Company',                  'COMP',     'C'),
            $this->toolkit->AddParameterChar('BOTH', 3,   'Company code',             'COMPCOD',  $this->k3sConfig['compcod']),
            $this->toolkit->AddParameterChar('BOTH', 10,  'User calling the program', 'USER',     $this->k3sConfig['user']),
            $this->toolkit->AddParameterChar('BOTH', 1,   'Error indicator',          'ERRORS',   null),
            $this->toolkit->AddParameterChar('BOTH', 100, 'Error message',            'ERRMSG',   null),
            $this->toolkit->AddParameterChar('BOTH', 20,  'Field in error',           'ERRFIELD', null),
            $this->toolkit->AddParameterChar('BOTH', 5,   'Location',                 'IDLOCN',   '1'),
            $this->toolkit->AddParameterChar('BOTH', 10,  'Purchase Order Number',    'IDPON',    '0')
        ]);

        $this->assertEquals($result['io_param']['ERRORS'], '1');
        $this->assertEquals($result['io_param']['ERRMSG'], 'Purchase order value invalid');
        $this->assertEquals($result['io_param']['ERRFIELD'], 'idpon');
    }

    public function testValidInputSetsAppropriatePOStatus()
    {
        $poNumber = '0061923';

        $result = $this->toolkit->pgmCall('AC_IGNORDR', 'ACS_5OBJ', [
            $this->toolkit->AddParameterChar('BOTH', 10,  'K3S Object library',       'K3SOBJ',   $this->k3sConfig['k3sobj']),
            $this->toolkit->AddParameterChar('BOTH', 1,   'Company',                  'COMP',     'C'),
            $this->toolkit->AddParameterChar('BOTH', 3,   'Company code',             'COMPCOD',  $this->k3sConfig['compcod']),
            $this->toolkit->AddParameterChar('BOTH', 10,  'User calling the program', 'USER',     $this->k3sConfig['user']),
            $this->toolkit->AddParameterChar('BOTH', 1,   'Error indicator',          'ERRORS',   null),
            $this->toolkit->AddParameterChar('BOTH', 100, 'Error message',            'ERRMSG',   null),
            $this->toolkit->AddParameterChar('BOTH', 20,  'Field in error',           'ERRFIELD', null),
            $this->toolkit->AddParameterChar('BOTH', 5,   'Location',                 'IDLOCN',   '1'),
            $this->toolkit->AddParameterChar('BOTH', 10,  'Purchase Order Number',    'IDPON',    $poNumber)
        ]);

        $sql = "SELECT AL_RECEIVE FROM TST_5DTA.K_INTORDL WHERE AL_COMP='C' and AL_LOCN='1' and AL_PO#='$poNumber'";
        $result = Bootstrap::executeSqlWithOneResult($sql);

        $this->assertEquals($result['AL_RECEIVE'], 'I');

        $result = $this->toolkit->pgmCall('AC_IGNORDR', 'ACS_5OBJ', [
            $this->toolkit->AddParameterChar('BOTH', 10,  'K3S Object library',       'K3SOBJ',   $this->k3sConfig['k3sobj']),
            $this->toolkit->AddParameterChar('BOTH', 1,   'Company',                  'COMP',     'C'),
            $this->toolkit->AddParameterChar('BOTH', 3,   'Company code',             'COMPCOD',  $this->k3sConfig['compcod']),
            $this->toolkit->AddParameterChar('BOTH', 10,  'User calling the program', 'USER',     $this->k3sConfig['user']),
            $this->toolkit->AddParameterChar('BOTH', 1,   'Error indicator',          'ERRORS',   null),
            $this->toolkit->AddParameterChar('BOTH', 100, 'Error message',            'ERRMSG',   null),
            $this->toolkit->AddParameterChar('BOTH', 20,  'Field in error',           'ERRFIELD', null),
            $this->toolkit->AddParameterChar('BOTH', 5,   'Location',                 'IDLOCN',   '1'),
            $this->toolkit->AddParameterChar('BOTH', 10,  'Purchase Order Number',    'IDPON',    $poNumber)
        ]);

        $sql = "SELECT AL_RECEIVE FROM TST_5DTA.K_INTORDL WHERE AL_COMP='C' and AL_LOCN='1' and AL_PO#='$poNumber'";
        $result = Bootstrap::executeSqlWithOneResult($sql);

        $this->assertNotEquals($result['AL_RECEIVE'], 'I');
    }
}