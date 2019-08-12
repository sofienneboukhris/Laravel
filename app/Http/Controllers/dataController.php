<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Hotels;
use App\Ville;
use App\Arrangemnt;
use App\Price;
use App\Scarping;
use DB;

class dataController extends Controller
{
    public function Database()
    {
        $Hotels = new Hotels();
        $Ville = new Ville();
        $Arrangemnt = new Arrangemnt();
        $Price = new Price();
        $Scarping = new Scarping();
        $importData_arr = array();
        $i = 0;
        if (($handle = fopen(public_path().'/lastminute.csv', 'r')) !== false) {
            while (($data = fgetcsv($handle, 100000, ',')) !== false) {
                $num = count($data);
                if ($i == 0) {
                    ++$i;
                    continue;
                }
                for ($c = 0; $c < $num; ++$c) {
                    $importData_arr[$i][] = $data[$c];
                    if ($c == 0) {
                        $libelle_hot[] = "'".$importData_arr[$i][0]."'";
                        $pos = strpos("'".$importData_arr[$i][0]."'", '*');
                        $etole_hot[] = substr("'".$importData_arr[$i][0]."'", $pos - 1, 1);
                    }
                    if ($c == 1) {
                        $date_dep[] = Carbon::createFromFormat('d/m/Y', $importData_arr[$i][1]);
                    }
                    if ($c == 2) {
                        $date_arr[] = Carbon::createFromFormat('d/m/Y', $importData_arr[$i][2]);
                    }
                    if ($c == 3) {
                        $libelle_ville[] = "'".$importData_arr[$i][3]."'";
                    }
                    if ($c == 4) {
                        $ville_hot[] = "'".$importData_arr[$i][4]."'";
                    }
                    if ($c == 5) {
                        $nbr_nuit[] = "'".$importData_arr[$i][5]."'";
                    }
                    if ($c == 6) {
                        $libelle_arr[] = "'".$importData_arr[$i][6]."'";
                    }
                    if ($c == 7) {
                        $prices[] = $importData_arr[$i][7];
                    }
                }

                ++$i;

                $desc_hot[] = '';
                $desc_arr[] = '';
                $url_page[] = '';
                $data_scrap[] = '';
            }
            fclose($handle);

            for ($importData_arr = 0; $importData_arr < 15000; ++$importData_arr) {
                $hotel[$importData_arr] =
        [
            'libelle_hot' => $libelle_hot[$importData_arr],
            'ville_hot' => $ville_hot[$importData_arr],
            'desc_hot' => $desc_hot[$importData_arr],
            'etole_hot' => $etole_hot[$importData_arr],
        ];
                $price[$importData_arr] =
        [
             'date_dep' => $date_dep[$importData_arr],
             'date_arr' => $date_arr[$importData_arr],
             'prices' => $prices[$importData_arr],
             'nbr_nuit' => $nbr_nuit[$importData_arr],
        ];

                $ville[$importData_arr] =
        [
              'libelle_ville' => $libelle_ville[$importData_arr],
        ];

                $arrangement[$importData_arr] =
        [
              'libelle_arr' => $libelle_arr[$importData_arr],
              'desc_arr' => $desc_arr[$importData_arr],
        ];

                $scraping[$importData_arr] =
        [
                'url_page' => $url_page[$importData_arr],
                'data_scrap' => $data_scrap[$importData_arr],
        ];
            }
            DB::table('hotels')->insert($hotel);
            DB::table('price')->insert($price);
            DB::table('ville')->insert($ville);
            DB::table('arrangement')->insert($arrangement);
            DB::table('scraping')->insert($scraping);
        }
    }
}
