<?php

class AtaComponent extends Component {

    function getAta($parents = array()) {

        $parentCount = (count($parents));

        $trayArray = array();

        switch ($parentCount) {
            case 5:
                //$trayArray['prjType'] = $parents[1]['Tray']['ata_code'];
                $trayArray['ata'] = $parents[2]['Tray']['ata_code'];
                $trayArray['subAta'] = $parents[3]['Tray']['ata_code'];
                $trayArray['subAtaTwo'] = $parents[4]['Tray']['ata_code'];
                $trayArray['position'] = 5;
                break;
            case 4:
                //$trayArray['prjType'] = $parents[1]['Tray']['ata_code'];
                $trayArray['ata'] = $parents[2]['Tray']['ata_code'];
                $trayArray['subAta'] = $parents[3]['Tray']['ata_code'];
                $trayArray['subAtaTwo'] = 'X';
                $trayArray['position'] = 4;
                break;
            case 3:
                //$trayArray['prjType'] = $parents[1]['Tray']['ata_code'];
                $trayArray['ata'] = $parents[2]['Tray']['ata_code'];
                $trayArray['subAta'] = 'X';
                $trayArray['subAtaTwo'] = 'X';
                $trayArray['position'] = 3;
                break;
            case 2:
                //$trayArray['prjType'] = $parents[1]['Tray']['ata_code'];
                $trayArray['ata'] = 'X';
                $trayArray['subAta'] = 'X';
                $trayArray['subAtaTwo'] = 'X';
                $trayArray['position'] = 2;
                break;
            case 1 :
                //$trayArray['prjType'] = 'X';
                $trayArray['ata'] = 'X';
                $trayArray['subAta'] = 'X';
                $trayArray['subAtaTwo'] = 'X';
                $trayArray['position'] = 1;
                break;
            default :
                //$trayArray['prjType'] = $parents[1]['Tray']['ata_code'];
                $trayArray['ata'] = $parents[2]['Tray']['ata_code'];
                $trayArray['subAta'] = $parents[3]['Tray']['ata_code'];
                $trayArray['subAtaTwo'] = $parents[4]['Tray']['ata_code'];
                $trayArray['position'] = 0;
                break;
        }
        return $trayArray;
    }

}

?>
