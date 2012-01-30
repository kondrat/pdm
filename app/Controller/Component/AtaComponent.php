<?php

class AtaComponent extends Component {

    function getAta($parents = array()) {

        $parentCount = (count($parents));

        $trayArray = array();

        switch ($parentCount) {
            case 5:
                $trayArray['prjType'] = $parents[1]['Tray']['drw_letter'];
                $trayArray['ata'] = $parents[2]['Tray']['drw_letter'];
                $trayArray['subAta'] = $parents[3]['Tray']['drw_letter'];
                $trayArray['subAtaTwo'] = $parents[4]['Tray']['drw_letter'];
                $trayArray['position'] = 5;
                break;
            case 4:
                $trayArray['prjType'] = $parents[1]['Tray']['drw_letter'];
                $trayArray['ata'] = $parents[2]['Tray']['drw_letter'];
                $trayArray['subAta'] = $parents[3]['Tray']['drw_letter'];
                $trayArray['subAtaTwo'] = NULL;
                $trayArray['position'] = 4;
                break;
            case 3:
                $trayArray['prjType'] = $parents[1]['Tray']['drw_letter'];
                $trayArray['ata'] = $parents[2]['Tray']['drw_letter'];
                $trayArray['subAta'] = NULL;
                $trayArray['subAtaTwo'] = NULL;
                $trayArray['position'] = 3;
                break;
            case 2:
                $trayArray['prjType'] = $parents[1]['Tray']['drw_letter'];
                $trayArray['ata'] = NULL;
                $trayArray['subAta'] = NULL;
                $trayArray['subAtaTwo'] = NULL;
                $trayArray['position'] = 2;
                break;
            case 1 :
                $trayArray['prjType'] = NULL;
                $trayArray['ata'] = NULL;
                $trayArray['subAta'] = NULL;
                $trayArray['subAtaTwo'] = NULL;
                $trayArray['position'] = NULL;
                break;
            default :
                $trayArray['prjType'] = $parents[1]['Tray']['drw_letter'];
                $trayArray['ata'] = $parents[2]['Tray']['drw_letter'];
                $trayArray['subAta'] = $parents[3]['Tray']['drw_letter'];
                $trayArray['subAtaTwo'] = $parents[4]['Tray']['drw_letter'];
                $trayArray['position'] = NULL;
                break;
        }
        return $trayArray;
    }

}

?>
