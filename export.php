<?php
require_once 'Modele/Etude.php';
$idEtude = filter_input(INPUT_GET, "etude", FILTER_SANITIZE_NUMBER_INT);

$bdd = new Modele();
$etude = $bdd->getEtude($idEtude);
$nomEtude = $etude->getNom();
$villeEtude = $etude->getVille();
$titre = $nomEtude . ' - ' . $villeEtude;
$zones = $bdd->getListeZone($idEtude);
$especes = $bdd->getListeEspeceByEtude($idEtude);

header('Content-Type: application/xml');
header('Content-Disposition: attachment; filename="' . $titre . '.kml"');
echo '<?xml version="1.0" encoding="UTF-8"?>'
?>
<kml xmlns="http://www.opengis.net/kml/2.2" xmlns:gx="http://www.google.com/kml/ext/2.2" xmlns:kml="http://www.opengis.net/kml/2.2" xmlns:atom="http://www.w3.org/2005/Atom">
    <Document>
        <name><?= $titre ?>.kml</name>
        <StyleMap id="m_ylw-pushpin1">
            <Pair>
                <key>normal</key>
                <styleUrl>#s_ylw-pushpin</styleUrl>
            </Pair>
            <Pair>
                <key>highlight</key>
                <styleUrl>#s_ylw-pushpin_hl00</styleUrl>
            </Pair>
        </StyleMap>
        <Style id="s_ylw-pushpin_hl00">
            <IconStyle>
            <scale>1.3</scale>
            <Icon>
            <href>http://maps.google.com/mapfiles/kml/pushpin/ylw-pushpin.png</href>
            </Icon>
            <hotSpot x="20" y="2" xunits="pixels" yunits="pixels"/>
            </IconStyle>
            <LineStyle>
            <color>ffffaa00</color>
            </LineStyle>
            <PolyStyle>
            <color>7fffaa00</color>
            </PolyStyle>
        </Style>
        <Style id="s_ylw-pushpin">
            <IconStyle>
            <scale>1.1</scale>
            <Icon>
            <href>http://maps.google.com/mapfiles/kml/pushpin/ylw-pushpin.png</href>
            </Icon>
            <hotSpot x="20" y="2" xunits="pixels" yunits="pixels"/>
            </IconStyle>
            <LineStyle>
            <color>ffffaa00</color>
            </LineStyle>
            <PolyStyle>
            <color>7fffaa00</color>
            </PolyStyle>
        </Style>
        <Folder>
            <name><?= $titre ?></name>
            <open>1</open>
            <description>
                Superficie : <?= $etude->getSuperficie() ?> m²
                Date : <?= $etude->getDatePrelevFormatFr() ?>
            </description>
            <Style>
                <ListStyle>
                <listItemType>check</listItemType>
                <bgColor>00ffffff</bgColor>
                <maxSnippetLines>2</maxSnippetLines>
                </ListStyle>
            </Style>
            <?php foreach ($zones as $zone) : ?>
                <Placemark>
                    <name><?= $zone->getNom(); ?></name>
                    <description>
                        Superficie : <?= $zone->getSurface() ?> m²
                        <?php $especesZone = $bdd->getEspecesByIdZone($zone->getId());
                        foreach ($especesZone as $especeZone) : ?>
                            <?= $especeZone->getNom() . " : " .$especeZone->getQuantite() . " (densité : " . $especeZone->getDensite() . ")\r\n" ?>
                        <?php endforeach; ?>
                    </description>
                    <styleUrl>#m_ylw-pushpin1</styleUrl>
                    <Polygon>
                        <tessellate>1</tessellate>
                        <outerBoundaryIs>
                            <LinearRing>
                                <coordinates>
                                    <?= $zone->getCoordonneesGPSbyCase(0)->getLongitude(); ?>,<?= $zone->getCoordonneesGPSbyCase(0)->getLatitude(); ?>,0
                                    <?= $zone->getCoordonneesGPSbyCase(1)->getLongitude(); ?>,<?= $zone->getCoordonneesGPSbyCase(1)->getLatitude(); ?>,0
                                    <?= $zone->getCoordonneesGPSbyCase(2)->getLongitude(); ?>,<?= $zone->getCoordonneesGPSbyCase(2)->getLatitude(); ?>,0
                                    <?= $zone->getCoordonneesGPSbyCase(3)->getLongitude(); ?>,<?= $zone->getCoordonneesGPSbyCase(3)->getLatitude(); ?>,0
                                </coordinates>
                            </LinearRing>
                        </outerBoundaryIs>
                    </Polygon>
                </Placemark>
            <?php endforeach; ?>
        </Folder>
    </Document>
</kml>
