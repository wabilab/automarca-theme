<?php 

$alimentazioniArr = ['benzina', 'ibrida' , 'benzina_verde' , 'benzina-verde' , 'benzina verde' , 'elettrica' , 'diesel' , 'metano' , 'gpl'];

$marcheArr = ["Abarth","Alfa Romeo","Aston Martin","Audi","Bentley","BMW","Bugatti","Cadillac","Chevrolet","Chrysler","Citroën","Dacia","Daewoo","Daihatsu","Dodge","Donkervoort","DS","Ferrari","Fiat","Fisker","Ford","Honda","Hummer","Hyundai","Infiniti","Iveco",
"Jaguar","Jeep","Kia","KTM","Lada","Lamborghini","Lancia","Land Rover","Landwind","Lexus","Lotus","Maserati","Maybach","Mazda","McLaren","Mercedes-Benz","MG","Mini","Mitsubishi","Morgan","Nissan","Opel","Peugeot","Porsche","Renault","Rolls-Royce","Rover","Saab","Seat","Skoda","Smart","SsangYong","Subaru","Suzuki","Tesla","Toyota","Volkswagen","Volvo"];


$modelArr = [
    'Abarth' => [
        '595','595C'
    ],
    'Alfa romeo' => [
        '145' , '146' , '147' , '155' , '156' , '159' , '164' , '166' , '1750' , '2000' , '33' , '4C' , '75' , '8C' , '90' , 'Alfa 6' , 'Alfasud' , 'Alfetta' , 'Brera' , 'Crosswagon' , 'Giulia' , 'Giulietta' , 'GT' ,'GTV' ,'Mito' , 'Quadrifoglio' , 'RZ' , 'Spider' , 'Sportwagon' , 'Sprint' , ' Stelvio' , 'SZ' , 'Tonale' 
    ],
    'BMW' => [
        '2002' , 'i3' , 'iX3' , 'M1' , 'serie 1' , 'serie 2' , 'serie 3' , 'serie 4' , 'serie 5' , 'serie 6' , 'serie 7' ,'serie 8' , 'serie M' ,'serie X' , 'serie Z'
    ],
    'Audi' => [
        '100' ,'200' , '50' , '80' , '90' ,'A1' , 'A2' ,'A3' ,'A4' ,'A5' , 'A6' ,'A7' ,'A8', 'Coupe' , 'e-tron' , 'Q1' ,'Q2','Q3','Q4','Q5','Q6','Q7' ,'Q8' ,'QUATTRO' , 'R8','R5', 'RS' ,'S1','S2','S3','S4','S5' ,'S6', 'S7' ,'S8','TT', 'V8'
    ],
    'Chrysler' => [
        '200' , '300M' , '300 SRT' , 'Aspen' ,' Crossfire' ,'Daytona' ,'Es' ,'Grand voyager' , 'GS' , 'Imperial' , 'Neon' , 'Pacifica' , 'Prowler' , 'PT Cruiser' , 'Ram van' ,'Saratoga' , 'Stratus' , 'Valiant' ,'Viper' ,'Vision' , 'Voyager'
    ],
    'Citroen' => [
        '2CV' , 'Acadiane' , 'Ami' , 'Ax' , 'Axel' , 'Berlingo' , 'BX' , 'C-Crosser' , 'C-Elysee' , 'C-Zero' , 'C1' , 'C2', 'C3' , 'C4' , 'C5' , 'C6' ,'C8' , 'CX' , 'DS' , 'Jumper' , 'Jumpy' , 'Nemo' , 'SAXO' , 'Xantia' , 'Xsara' , 'ZX'
    ],
    'Dacia' => [
        '1310' , 'Berlina' , 'Break' ,'Dokker' , 'Duster' , 'Lodgy' , 'Logan' , 'Nova' , 'Pick up' , 'Sandero' , 'Solenza' ,'Spring'
    ],
    'Daewoo' => [
        'Aranos' , 'Damas' , 'Espero' , 'Evanda' , 'Kalos' , 'Korando' , 'Lacetti' , 'Lanos' , 'Leganza' , 'Lublin' , 'Matiz' , 'Musso' , 'Nexia' , 'Nubira' , 'Rexton' , 'Rezzo' , 'Tacuma' , 'Tico' , 'Truck Plus'
    ],
    'Daihatsu' => [
        'Applause' , 'Charade' , 'Charmant' , 'Copen' , 'Cuore' , 'Domino' , 'Extol' , 'F Modelle' , 'Feroza' , 'Freeclimber' , 'Gran Move' , 'Hijet' , 'Materia' , 'Move' , 'Pioner' ,'Rocky' , 'Sirion' , 'Tarf' , 'Terios' ,'Trevis' , 'Valera' , 'YRV'
    ],
    'Fiat' => [
        '124' , '126' , '127' , '128' , '130' , '131' , '132' ,'133' ,'242' ,'500' , '500L' , '500X' , '595' , '600' , 'Brava' , 'Bravo' , 'Campagnola' , 'Coupe' , 'Croma' , 'Doblo' , 'Ducato' , 'Duna' , 'Fiorino' , 'Freemont' , 'Grande punto' , 'Idea' , 'Linea' , 'Marea' , 'Marengo' , 'Maxi' , 'Multipla' , 'Panda' , 'Palio' , 'Penny' , 'Punto' , 'Qubo' , 'Regata' , ' Ritmo' , 'Scudo' , 'Seicento' , 'Stilo' , 'Tempra' , 'Tipo' , 'Ulysse' , 'Uno'
    ],
    'Ford' => [
        'Aerostar' , 'B-Max' , 'Bronco' , 'C-Max' , 'Capri' , 'Connect Elektro' , ' Consul' , 'Cougar' , 'Courier' , 'Crown' , 'Edge' , ' Escape' , 'Escort' , 'Excursion' , 'Expedition' , 'Explorer' , 'Express' , 'Falcon' , 'Fiesta' , 'Flex' , 'Focus' , 'Freestyle' , 'Fusion' , 'Galaxy' , 'GT' , 'Ka' , 'Kuga' , 'Maverick' , 'Mercury' , 'Mondeo' , 'Mustang' , 'Orion' , 'Probe' , 'Puma', 'Ranger' , 'Rs 200' , 'S-Max' , 'Scorpio' , 'Sierra' , 'Sportka' , 'Taurus' , 'Tourneo' , 'Transit'
    ],
    'Honda' => [
        'Accord' , 'Ascot' , 'Avancier' , 'Beat' , 'Capa' , 'City' , 'Civic' , 'Clarity' , 'Concerto' , 'CR-V' , 'CR-Z' , 'CRX' , 'Element' , 'Fit' , 'FR-V' , 'HR-V' , 'Insight' , 'Inspire' , 'Integra' , 'Jazz' , 'Legend' , 'Life' , 'Logo' , 'Mobilio' , 'NSX' , 'Odyssey' , 'Orthia' , 'Prelude' , ' Quintet' , ' S 2000' , 'Saber' ,'Shuttle' , 'Torneo'
    ],
    'Hyundai' => [
        'Accent' , 'Atos' , 'Avante' , 'Azera' , 'Bayon' , 'Coupe' , 'Creta' , 'Elantra' , 'Equus' , 'Excel' , 'Galloper' , 'Genesis' , 'Getz' , 'Grace' , 'Grandeur' , 'H 100' , 'H 300' , 'i10', 'i20' , 'i30' , 'i40' , 'i50' , 'i800','Ioniq' , 'iX20' , 'iX35' , 'iX55' , 'Kona' , 'Lantra' , 'Matrix', 'Nero' , 'Pony' , 'Porter' , 'S-Coupe' , 'Santa Fe' , 'Santamo' , 'Solaris' , 'Sonata' , 'Sonica' ,'Stellar' , 'Terrancan' , 'Tucson' , 'Veracruz' , 'Verna' ,'XG'
    ],
    'Infiniti' => [
        'EX' , 'FX' , 'G25' , 'G35' , 'G37' , 'I35' , 'JX35' , 'M30' , 'M35' , 'M37' , 'M45' , 'Q30' , 'Q45' , 'Q50' , 'Q60' , 'Q70' , 'Q80' , 'QX'
    ],
    'Iveco' => [
        'Daily', 'Massif', 'Campagnola'
    ],
    'Jaguar' => [
        '420' , 'D-Type' , 'Daimler' , 'E-Pace' , 'E-Type' , 'F-Pace' , 'F-Type' , 'I-Pace' , 'MK II' , 'S-Type' , 'Sovereingn' , 'X-Type' , 'X300' , 'XE' , 'XF' , 'XJ' , 'XK'  
    ],
    'Jeep' => [
        'Cherokee' , 'CJ' , 'Comanche' , 'Commander' , 'Compass' , 'Gladiator' , 'Grand Cherokee' , 'Liberty' , 'Patriot' , 'Renegade' , 'Wagoneer' , 'Willys' , 'Wrangler'
    ],
    'Kia' =>[
        'Basta' , 'Crens' , 'Carnival' , 'Ceed' , 'Cerato' , 'Claus' , 'e-Niro' , 'Elan' , 'Joice' , 'K2500' , 'K2700' , 'K2900' , 'Leo' , 'Magentis' , ' Mentor' , 'Mohave' , 'Niro' , 'Opirus' , 'Optima' , 'Picanto' , 'Pregio' , 'Pride' , 'Retona' , 'Rio' , 'Roadster' , 'Rocta' , 'Sephia' ,'Shuma' , 'Sorento' , 'Soul' , 'Spectra' , 'Sportage' , 'Stinger' ,  'Stonic' , 'Venga' , 'Xceed'
    ],
    'Lancia' => [
        'Appia' , 'Beta' , 'Dedra' , 'Delta' , 'Flaminia' , 'Flavia' , 'Gamma' , 'HPE' , 'Kappa' , 'Lybra' ,'MUSA' , 'Phedra' , 'Prisama' , 'Stratos' , 'Thema' , 'Thesis' , 'Trevi' , 'Voyager' , 'Y' , 'Ypsilon' , 'Zeta'
    ],
    'Land Rover' => [
        'Defender' , 'Discovery' , 'Freelander' , 'LRX' , 'Range Rover' , 'Series'
    ],
    'Lexus' => [
        'CT 200' , 'LFA' , ' ES' , 'GS' , 'GX' , 'IS' , 'LC' , 'LS' , 'LX' , 'NX' , 'RC' , 'RX' , 'SC' , 'UX'  
    ],
    'Mazda' =>[
        '121' , '2','3','323' , '5' , '6' , '626' , '926' ,'Atenza' , 'Axela' , 'Bongo' , 'BT-50' ,'CX-3' , 'CX-30' , 'CX-5' , 'CX-7' , 'CX-9','Demio' , 'E Series' , 'Familia' , 'Millenia' , 'MPV' , 'MX-3' , 'MX-30' , 'MX-5' , 'MX-6' , 'Pick Up' , 'Premacy' , 'RX-7' ,'RX-8' ,'RX-9','Tribute' , 'Xedos'
    ],
    


];
